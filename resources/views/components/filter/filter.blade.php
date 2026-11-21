<aside id="filter"
       @class([
           'group/filter',
           'bg-transparent',
           'data-[expanded]:bg-slate-500/50',
           'backdrop-blur-none fixed flex inset-0 justify-end invisible',
           'data-[expanded]:backdrop-blur-lg data-[expanded]:visible',
           'transition-[backdrop-filter,_background-color,_visibility] duration-250 ease-[cubic-bezier(0.5,_0,_0.25,_1)] delay-0',
       ])>
    <div @class([
        'bg-white dark:bg-black',
        'flex flex-col h-full justify-between pb-12 pl-8 pr-6 w-3/4',
        'translate-x-full',
        'group-data-[expanded]/filter:translate-x-0',
        'transition-[translate] duration-250 ease-[cubic-bezier(0.5,_0,_0.25,_1)] delay-0',
        'sm:w-1/2',
        'lg:w-1/4',
    ])>
        <div @class([
            'bg-white dark:bg-black',
            'flex items-center justify-between h-12 w-full',
        ])>
            <x-typography.heading level="2"
                                  :content="__('components/filter.heading')" />
            <button type="button"
                    aria-label="{{ __('components/filter.label.close') }}"
                    @class([
                        'focus:outline-sky-500',
                        'aspect-square cursor-pointer flex items-center h-full -mr-4 p-2',
                        'focus:outline-1 focus:-outline-offset-8',
                    ])>
                <x-icon viewBox="0 0 24 24"
                        component="icon.close" />
            </button>
        </div>
        <div @class(['flex flex-1 flex-col overflow-y-scroll scrollbar-none'])>
            {{ $slot }}
        </div>
        <div @class(['flex gap-4 mt-12'])>
            <a href="{{ route('admin.products') }}"
               @class([
                   'border-slate-300 dark:border-slate-700',
                   'focus:outline-sky-500',
                   'hover:border-slate-500',
                   'aspect-square border cursor-pointer h-12 p-2 rounded-full',
                   'focus:outline-1 focus:outline-offset-2',
               ])>
                <x-icon component="icon.replay" />
            </a>
            <x-button.secondary form="filter-form"
                                type="submit"
                                :text="__('components/filter.button.submit')" />
        </div>
    </div>
</aside>
