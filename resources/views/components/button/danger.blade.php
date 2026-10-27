<button {{ $attributes }}
        @class([
            'bg-transparent',
            'border-red-600 dark:border-red-400',
            'text-red-600 dark:text-red-400',
            'focus:outline-sky-500',
            'hover:bg-red-600 dark:hover:bg-red-400',
            'hover:border-transparent',
            'hover:text-white',
            'border cursor-pointer h-12 px-6 rounded-full w-full',
            'focus:outline-1 focus:outline-offset-2',
        ])>{{ $text }}</button>
