<x-app :title="__('inventory/admin/product.title.products')">
    <div @class(['mb-2 mt-16', 'sm:mt-4', 'lg:mt-0'])>
        <x-typography.heading level="1"
                              :content="__('inventory/admin/product.heading.products')" />
    </div>
    <div @class(['mb-16 text-center'])>
        <p>{{ __('inventory/admin/product.description.subheading.products') }}</p>
    </div>
    <nav @class([
        'bg-slate-100/25 dark:bg-slate-900/25',
        'backdrop-blur-lg flex h-12 mb-8 min-w-max -mx-4 px-8 py-2 sticky top-0',
    ])>
        <ul @class(['flex gap-8'])>
            <li @class(['flex'])>
                <ul @class(['flex gap-2'])>
                    <li>
                        <button type="button"
                                command="show-modal"
                                commandfor="searchbar-dialog"
                                @class([
                                    'focus:outline-sky-500',
                                    'hover:bg-black dark:hover:bg-white',
                                    'hover:text-white dark:hover:text-black',
                                    'aspect-square cursor-pointer flex h-full items-center justify-center rounded-lg',
                                    'focus:outline-1',
                                ])>
                            <div @class(['h-6'])>
                                <x-icon viewBox="0 0 24 24"
                                        component="icon.search" />
                            </div>
                        </button>
                    </li>
                    <li>
                        <button type="button"
                                aria-label="{{ __('components/filter.label.open') }}"
                                aria-controls="filter"
                                aria-expanded="false"
                                @class([
                                    'focus:outline-sky-500',
                                    'hover:bg-black dark:hover:bg-white',
                                    'hover:text-white dark:hover:text-black',
                                    'aspect-square cursor-pointer flex h-full items-center justify-center rounded-lg',
                                    'focus:outline-1',
                                ])>
                            <div @class(['h-6'])>
                                <x-icon viewBox="0 0 24 24"
                                        component="icon.tune" />
                            </div>
                        </button>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.product.add') }}"
                   @class([
                       'focus:outline-sky-500',
                       'hover:bg-sky-400 dark:hover:bg-sky-600',
                       'hover:text-white',
                       'aspect-square flex h-full items-center justify-center rounded-lg',
                       'focus:outline-1',
                   ])>
                    <div @class(['h-6'])>
                        <x-icon component="icon.add" />
                    </div>
                </a>
            </li>
            @if ($products->isNotEmpty())
                <li>
                    <button type="button"
                            command="show-modal"
                            commandfor="products-delete-dialog"
                            @class([
                                'focus:outline-sky-500',
                                'hover:bg-red-400 dark:hover:bg-red-600',
                                'hover:text-white',
                                'aspect-square cursor-pointer flex h-full items-center justify-center rounded-lg',
                                'focus:outline-1',
                            ])>
                        <div @class(['h-6'])>
                            <x-icon viewBox="0 0 24 24"
                                    component="icon.delete" />
                        </div>
                    </button>
                </li>
            @endif
        </ul>
    </nav>
    <x-layout.product.list>
        @if ($products->isEmpty())
            <div @class(['col-span-full flex h-32 items-center justify-center'])>
                <p @class(['text-center'])>{{ __('inventory/admin/product.description.empty_products') }}</p>
            </div>
        @else
            @foreach ($products as $product)
                <x-card.product>
                    <div @class(['flex'])>
                        <div @class(['flex gap-4 h-32 p-1 w-full'])>
                            <div @class([
                                'bg-slate-200 dark:bg-slate-800',
                                'aspect-square h-full p-1 rounded-xl',
                            ])>
                                @if (!$product->image)
                                    <div @class(['p-8'])>
                                        <x-icon component="icon.photo-camera"
                                                viewBox="0 0 24 24" />
                                    </div>
                                @else
                                    <img src="{{ glideImage($product->image, 128) }}"
                                         alt=""
                                         @class(['object-contain p-2 size-full'])>
                                @endif
                            </div>
                            <div @class([
                                'divide-slate-300 dark:divide-slate-700',
                                'divide-x-1 flex gap-1 items-center w-full',
                            ])>
                                <div @class([
                                    'flex flex-col gap-2 h-full overflow-hidden py-1 pr-4 w-full',
                                ])>
                                    <p @class(['text-slate-500'])>{{ $product->barcode }}</p>
                                    <p @class(['font-bold'])>{{ $product->brand }}</p>
                                    <p @class(['line-clamp-2'])>{{ $product->name }}</p>
                                </div>
                                <div @class(['h-full min-w-12'])>
                                    <a href="{{ route('admin.product.edit', ['uuid' => $product->uuid]) }}"
                                       @class([
                                           'focus:outline-sky-500',
                                           'hover:bg-slate-400 dark:hover:bg-slate-600',
                                           'hover:text-white',
                                           'flex items-center justify-center rounded-xl size-full',
                                           'focus:outline-1',
                                       ])>
                                        <div @class(['h-6'])>
                                            <x-icon viewBox="0 0 24 24"
                                                    component="icon.edit" />
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-card.product>
            @endforeach
        @endif
        <x-modal.searchbar id="searchbar-dialog"
                           data-search-route="{{ route('admin.products') }}"
                           :placeholder="__('inventory/admin/product.searchbar.placeholder')" />
        <x-modal.dialog id="products-delete-dialog">
            <div @class(['flex flex-col my-8'])>
                <div>
                    <x-typography.heading level="1"
                                          :content="__('inventory/admin/product.modal.products.heading')" />
                </div>
                <div @class(['my-4'])>
                    <div @class(['text-center'])>
                        <p>{{ __('inventory/admin/product.modal.products.question') }}</p>
                    </div>
                    <div @class(['text-red-700 dark:text-red-300', 'text-center'])>
                        <p>{{ __('inventory/admin/product.modal.products.warning') }}</p>
                    </div>
                    <ul @class(['list-disc mt-8 pl-4'])>
                        @foreach (__('inventory/admin/product.modal.products.informations') as $information)
                            <li>{{ $information }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <x-form id="products-delete-form"
                        action="{{ route('admin.products.delete') }}"
                        method="post" />
                <div @class(['flex gap-4'])>
                    <x-button.danger form="products-delete-form"
                                     type="submit"
                                     :text="__('inventory/admin/product.button.submit.products.delete')" />
                    <x-button.secondary type="button"
                                        autofocus
                                        command="close"
                                        commandfor="products-delete-dialog"
                                        :text="__('inventory/admin/product.modal.products.button.close')" />
                </div>
            </div>
        </x-modal.dialog>
    </x-layout.product.list>
    {{ $products->links('components.nav.pagination') }}
    <x-filter>
        <x-form id="filter-form"
                action="{{ route('admin.products') }}"
                method="get">
            <div @class(['flex flex-col'])>
                @foreach (trans('inventory/admin/product.filters') as $filter => $name)
                    <fieldset>
                        <legend @class([
                            'bg-white dark:bg-black',
                            'flex font-semibold h-12 items-center sticky top-0 w-full z-10',
                        ])>{{ $name }}</legend>
                        <div @class(['flex flex-col gap-4 p-4'])>
                            @foreach ($productsFilter as $key => $value)
                                @if ($key === $filter)
                                    @foreach ($value as $id => $name)
                                        <x-form.input id="{{ $filter . '-' . $id }}-checkbox"
                                                      name="{{ $filter }}[]"
                                                      type="checkbox"
                                                      value="{{ $id }}"
                                                      :label="$name"
                                                      :checked="in_array($id, request($key, []))" />
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </fieldset>
                @endforeach
            </div>
        </x-form>
    </x-filter>
</x-app>
