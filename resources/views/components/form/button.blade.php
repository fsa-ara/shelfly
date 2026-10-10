<button {{ $attributes }}
        @class([
            'bg-sky-400 dark:bg-sky-600',
            'text-white',
            'focus:outline-sky-500',
            'hover:bg-sky-500',
            'cursor-pointer h-12 px-4 rounded-full w-full',
            'focus:outline-1 focus:outline-offset-2',
        ])>{{ $text }}</button>
