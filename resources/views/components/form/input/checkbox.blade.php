<div @class([
    'flex items-center px-1 rounded-full',
    'focus-within:outline-sky-500',
    'focus-within:outline-1 focus-within:outline-offset-4',
])>
    <div @class(['relative size-4'])>
        <input {{ $attributes }}
               @class([
                   'peer',
                   'border-current',
                   'checked:border-transparent',
                   'absolute appearance-none border cursor-pointer inset-0 outline-none rounded-full z-2',
               ])>
        <div @class([
            'bg-transparent',
            'text-transparent',
            'peer-checked:bg-sky-400 dark:peer-checked:bg-sky-600',
            'peer-checked:text-white',
            'absolute inset-0 rounded-full z-1',
        ])>
            <x-icon component="icon.check-small" />
        </div>
    </div>
    <label for="{{ $attributes['id'] }}"
           @class(['cursor-pointer flex items-center pl-2'])>{{ $label }}</label>
</div>
