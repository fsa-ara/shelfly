<button {{ $attributes }}
        @class([
            'border-slate-300 dark:border-slate-700',
            'focus:outline-sky-500',
            'hover:border-sky-500',
            'hover:text-sky-500',
            'aria-selected:border-sky-400 dark:aria-selected:border-sky-600',
            'aria-selected:text-sky-400 dark:aria-selected:text-sky-600',
            'border col-span-1 cursor-pointer h-8 px-4 rounded-full',
            'focus:outline-1 focus:outline-offset-2',
        ])>{{ $text }}</button>
