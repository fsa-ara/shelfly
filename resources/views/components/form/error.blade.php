@error($type)
    <div @class(['flex gap-2'])>
        <div @class(['text-red-700 dark:text-red-300', 'aspect-square h-4'])>
            <x-icon component="icon.error" />
        </div>
        <p @class(['text-red-700 dark:text-red-300', 'text-xs'])>{{ $message }}</p>
    </div>
@enderror
