<button {{ $attributes }}
        @class([
            'bg-sky-500 dark:bg-sky-500/75',
            'text-white',
            'focus:outline-sky-500',
            'hover:bg-sky-500/75 dark:hover:bg-sky-500',
            'cursor-pointer h-16 px-4 py-2 rounded-2xl w-full',
            'focus:outline-1 focus:outline-offset-2',
        ])>{{ $text }}</button>
