<button {{ $attributes }}
        @class([
            'focus:outline-sky-500',
            'hover:bg-sky-50 dark:hover:bg-sky-950',
            'hover:text-sky-700 dark:hover:text-sky-300',
            'cursor-pointer flex gap-4 h-12 items-center pl-2 rounded-lg w-full',
            'focus:outline-1',
        ])>
    <div @class(['aspect-square h-6'])>
        <x-icon :component="$icon" />
    </div>
    {{ $text }}
</button>
