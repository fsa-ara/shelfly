<dialog id="searchbar-dialog"
        autofocus
        {{ $attributes }}
        @class([
            'bg-transparent',
            'text-current',
            'flex flex-col min-h-full mx-auto outline-none overflow-visible pb-24 pt-12 px-4 w-full',
            'not-open:hidden',
            'opacity-0 scale-75',
            'open:opacity-100 open:scale-100',
            'starting:open:opacity-0 starting:open:scale-75',
            'transition-[opacity,_scale] duration-250 ease-[cubic-bezier(0.5,_0,_0.25,_1)] delay-0',
            'backdrop:bg-transparent',
            'open:backdrop:bg-slate-700/75',
            'starting:open:backdrop:bg-transparent',
            'backdrop:backdrop-blur-none',
            'open:backdrop:backdrop-blur-lg',
            'starting:open:backdrop:backdrop-blur-none',
            'backdrop:transition-[backdrop-filter,_background] backdrop:duration-250 backdrop:ease-[cubic-bezier(0.5,_0,_0.25,_1)] backdrop:delay-0',
            'sm:w-sm',
        ])>
    <div @class(['flex gap-4 relative'])>
        <input id="searchbar-field"
               name="searchbar"
               type="text"
               placeholder="{{ $placeholder }}"
               @class([
                   'bg-slate-700 dark:bg-slate-900',
                   'text-white',
                   'focus:outline-sky-500',
                   'placeholder:text-current',
                   'h-12 pl-6 pr-12 py-4 rounded-full w-full',
                   'focus:outline-1',
                   'focus:placeholder:opacity-0',
               ])>
        <div @class(['absolute h-12 p-1 right-0'])>
            <button type="button"
                    command="close"
                    commandfor="{{ $attributes['id'] }}"
                    @class([
                        'text-white',
                        'focus:outline-sky-500',
                        'aspect-square cursor-pointer h-full p-2 rounded-full',
                        'focus:outline-1',
                    ])>
                <x-icon component="icon.close"
                        viewBox="0 0 24 24" />
            </button>
        </div>
    </div>
    <div @class(['flex flex-col min-h-0'])>
        <div id="no-results"
             @class(['text-slate-300', 'flex hidden justify-center my-8'])>
            <span>{{ __('components/searchbar.no_results') }}</span>
        </div>
        <div id="items-result"
             @class([
                 'divide-slate-300',
                 'divide-y flex flex-col hidden my-8 outline-none overflow-y-scroll scrollbar-none',
             ])>
        </div>
        <template id="item-template">
            <a @class([
                'text-slate-300',
                'focus:text-sky-500',
                'hover:text-white',
                'flex justify-between outline-none py-4 w-full',
            ])>
                <span>
                    <span @class(['highlight', 'text-sky-500'])></span>
                </span>
                <div>
                    <x-icon viewBox="0 0 24 24"
                            component="icon.arrow-forward" />
                </div>
            </a>
        </template>
        <div id="add-item"
             @class(['flex hidden justify-center'])>
            <a @class([
                'bg-sky-500',
                'text-white',
                'focus:outline-sky-500',
                'hover:bg-sky-400 dark:hover:bg-sky-600',
                'aspect-square flex h-12 items-center justify-center rounded-full',
                'focus:outline-1 focus:outline-offset-2',
            ])>
                <div @class(['h-6'])>
                    <x-icon component="icon.add" />
                </div>
            </a>
        </div>
    </div>
</dialog>
