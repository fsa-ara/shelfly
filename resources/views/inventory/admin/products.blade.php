<x-app :title="__('inventory/admin/product.title.products')">
    <div @class(['mb-2 mt-16', 'sm:mt-4', 'lg:mt-0'])>
        <x-typography.heading level="1"
                              :content="__('inventory/admin/product.heading.products')" />
    </div>
    <div @class(['mb-16 text-center'])>
        <p>{{ __('inventory/admin/product.description.subheading.products') }}</p>
    </div>
    <div @class([
        'bg-slate-100/25 dark:bg-slate-900/25',
        'backdrop-blur-lg flex gap-2 h-12 mb-8 min-w-max -mx-4 p-2 px-8 sticky top-0',
    ])>
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
        @if ($products->isNotEmpty())
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
        @endif
    </div>
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
</x-app>
