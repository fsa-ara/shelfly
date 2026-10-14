<button {{ $attributes }}
        @class([
            'bg-slate-100 dark:bg-slate-900',
            'border-slate-300 dark:border-slate-700',
            'text-current',
            'focus:outline-sky-500',
            'hover:bg-slate-700 dark:hover:bg-slate-300',
            'hover:border-transparent',
            'hover:text-white dark:hover:text-black',
            'border cursor-pointer h-12 px-6 rounded-full w-full',
            'focus:outline-1 focus:outline-offset-2',
        ])>{{ $text }}</button>
