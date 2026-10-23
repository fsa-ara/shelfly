<aside id="sidebar"
       @class([
           'group/sidebar',
           'bg-transparent',
           'data-[expanded]:bg-slate-500/50',
           'backdrop-blur-none fixed inset-0 invisible top-12 z-40',
           'data-[expanded]:backdrop-blur-lg data-[expanded]:visible',
           'col-start-1 row-start-2',
           'transition-[backdrop-filter,_background-color,_visibility] duration-250 ease-[cubic-bezier(0.5,_0,_0.25,_1)] delay-0',
           'lg:overflow-hidden lg:relative lg:top-0 lg:visible',
       ])>
    <div @class([
        'bg-white dark:bg-black',
        'h-full overflow-y-scroll scrollbar-none w-3/4',
        '-translate-x-full',
        'group-data-[expanded]/sidebar:translate-x-0',
        'transition-[translate] duration-250 ease-[cubic-bezier(0.5,_0,_0.25,_1)] delay-0',
        'sm:w-1/2',
        'lg:translate-none lg:w-full',
    ])>
        <div @class(['pl-6 pr-4 pb-12'])>
            <x-sidebar.nav.guest />
            <x-sidebar.nav.auth />
        </div>
    </div>
</aside>
