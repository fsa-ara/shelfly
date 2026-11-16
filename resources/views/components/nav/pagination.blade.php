<nav role="navigation"
     @class([
         'bg-slate-100/25 dark:bg-slate-900/25',
         'backdrop-blur-lg bottom-0 flex min-h-12 -mx-4 px-8 pt-4 pb-8 sticky',
     ])>
    <a href="{{ $paginator->previousPageUrl() }}"
       @class([
           'border-slate-700 dark:border-slate-300' => !$paginator->onFirstPage(),
           'text-current' => !$paginator->onFirstPage(),
           'hover:bg-black dark:hover:bg-white',
           'hover:border-transparent',
           'hover:text-white dark:hover:text-black',
           'border flex justify-start rounded-lg min-w-12',
           'border-slate-300 dark:border-slate-700' => $paginator->onFirstPage(),
           'text-slate-300 dark:text-slate-700' => $paginator->onFirstPage(),
           'pointer-events-none' => $paginator->onFirstPage(),
       ])>
        <div @class(['aspect-square h-8'])>
            <x-icon component="icon.keyboard-arrow-left"
                    viewBox="0 0 24 24" />
        </div>
    </a>
    <div @class(['flex items-center justify-center w-full'])>
        <span>{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</span>
    </div>
    <a href="{{ $paginator->nextPageUrl() }}"
       @class([
           'border-slate-700 dark:border-slate-300' => !$paginator->onLastPage(),
           'text-current' => !$paginator->onLastPage(),
           'hover:bg-black dark:hover:bg-white',
           'hover:border-transparent',
           'hover:text-white dark:hover:text-black',
           'border flex justify-end rounded-lg min-w-12',
           'border-slate-300 dark:border-slate-700' => $paginator->onLastPage(),
           'text-slate-300 dark:text-slate-700' => $paginator->onLastPage(),
           'pointer-events-none' => $paginator->onLastPage(),
       ])>
        <div @class(['aspect-square h-8'])>
            <x-icon component="icon.keyboard-arrow-right" />
        </div>
    </a>
</nav>
