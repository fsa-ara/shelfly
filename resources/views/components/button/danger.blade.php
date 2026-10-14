<button {{ $attributes }}
        @class([
            'bg-red-400 dark:bg-red-600',
            'text-white',
            'focus:outline-sky-500',
            'hover:bg-red-500',
            'cursor-pointer h-12 px-6 rounded-full w-full',
            'focus:outline-1 focus:outline-offset-2',
        ])>{{ $text }}</button>
