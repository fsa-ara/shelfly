<button {{ $attributes }}
        @class([
            'group/burger',
            'focus:outline-sky-500',
            'aspect-square cursor-pointer p-2 size-full',
            'focus:outline-1 focus:-outline-offset-8',
        ])>
    <x-icon component="icon.burger" />
</button>
