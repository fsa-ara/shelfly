<x-app :title="__('inventory/admin/category.title.categories')">
    <div @class(['mb-2 mt-16', 'sm:mt-4', 'lg:mt-0'])>
        <x-typography.heading level="1"
                              :content="__('inventory/admin/category.heading.categories')" />
    </div>
    <div @class(['mb-16 text-center'])>
        <p>{{ __('inventory/admin/category.description.subheading.categories') }}</p>
    </div>
    <div @class([
        'bg-slate-100/25 dark:bg-slate-900/25',
        'backdrop-blur-lg flex gap-2 h-12 mb-8 min-w-max -mx-4 p-2 px-8 sticky top-0',
    ])>
        <a href="{{ route('admin.category.add') }}"
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
        @if ($categories->isNotEmpty())
            <button type="button"
                    command="show-modal"
                    commandfor="categories-delete-dialog"
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
    <x-layout.list>
        @if ($categories->isEmpty())
            <div>
                <p>{{ __('inventory/admin/category.description.empty_categories') }}</p>
            </div>
        @else
            @foreach ($categories as $category)
                <x-card.category>
                    <div @class(['flex justify-between gap-4 size-full'])>
                        <div @class(['flex items-center min-w-0 pl-4'])>
                            <p @class(['truncate'])>{{ $category->translation->name }}</p>
                        </div>
                        <div @class(['aspect-square h-full p-1'])>
                            <a href="{{ route('admin.category.edit', ['uuid' => $category->uuid]) }}"
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
                </x-card.category>
            @endforeach
        @endif
        <x-modal.dialog id="categories-delete-dialog">
            <div @class(['flex flex-col my-8'])>
                <div>
                    <x-typography.heading level="1"
                                          :content="__('inventory/admin/category.modal.categories.heading')" />
                </div>
                <div @class(['my-4'])>
                    <div @class(['text-center'])>
                        <p>{{ __('inventory/admin/category.modal.categories.question') }}</p>
                    </div>
                    <div @class(['text-red-700 dark:text-red-300', 'text-center'])>
                        <p>{{ __('inventory/admin/category.modal.categories.warning') }}</p>
                    </div>
                    <ul @class(['list-disc mt-8 pl-4'])>
                        @foreach (__('inventory/admin/category.modal.categories.informations') as $information)
                            <li>{{ $information }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <div @class(['flex gap-4'])>
                    <x-form id="categories-delete-form"
                            action="{{ route('admin.categories.delete') }}"
                            method="post" />
                    <x-button.danger form="categories-delete-form"
                                     type="submit"
                                     :text="__('inventory/admin/category.button.submit.delete')" />
                    <x-button.secondary type="button"
                                        autofocus
                                        command="close"
                                        commandfor="categories-delete-dialog"
                                        :text="__('inventory/admin/category.modal.categories.button.close')" />
                </div>
            </div>
        </x-modal.dialog>
    </x-layout.list>
</x-app>
