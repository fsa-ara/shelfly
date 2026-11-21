<x-app :title="__('inventory/admin/category.title.add_category')">
    <div @class(['px-4', 'sm:flex sm:flex-col sm:items-center'])>
        <div @class(['sm:w-2/3', 'lg:w-1/2'])>
            <div @class(['mb-2 mt-16', 'sm:mt-4', 'lg:mt-0'])>
                <x-typography.heading level="1"
                                      :content="__('inventory/admin/category.heading.add_category')" />
            </div>
            <div @class(['mb-16 text-center'])>
                <p>{{ __('inventory/admin/category.description.subheading.add_category') }}</p>
            </div>
            <div @class(['mb-8'])>
                <x-form id="category-add-form"
                        action="{{ route('admin.category.create') }}"
                        method="post">
                    @foreach ($data as $locale => $infos)
                        <div @class(['flex flex-col gap-4 mb-4'])>
                            <div @class(['flex gap-4 h-12'])>
                                <div @class(['aspect-square h-full'])>
                                    <div @class([
                                        'bg-white dark:bg-black',
                                        'flex items-center justify-center rounded-lg size-full',
                                    ])>
                                        <span @class(["fi fi-{$infos['country']}"])></span>
                                    </div>
                                </div>
                                <div @class(['flex-1'])>
                                    <x-form.input id="category-add-{{ $infos['country'] }}-name-field"
                                                  name="translations[{{ $locale }}][name]"
                                                  type="text"
                                                  value="{{ old('translations.' . $locale . '.name') }}"
                                                  :label="__('inventory/admin/category.input.label.name')"
                                                  :isInvalid="$errors->has('translations.' . $locale . '.name')" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div @class(['h-8'])>
                        <x-form.error type="translations.*.name" />
                    </div>
                </x-form>
            </div>
            <div>
                <x-button.primary form="category-add-form"
                                  type="submit"
                                  :text="__('inventory/admin/category.button.submit.add_category.create')" />
            </div>
            <div @class(['flex justify-center mt-8'])>
                <a href="{{ route('admin.categories') }}"
                   @class([
                       'border-slate-700 dark:border-slate-300',
                       'focus:outline-sky-500',
                       'hover:bg-slate-700 dark:hover:bg-slate-300',
                       'hover:text-slate-300 dark:hover:text-slate-700',
                       'aspect-square border flex h-12 items-center justify-center rounded-full',
                       'focus:outline-1 focus:outline-offset-2',
                   ])>
                    <div @class(['h-6'])>
                        <x-icon component="icon.arrow-back" />
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app>
