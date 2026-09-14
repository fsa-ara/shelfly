@error($type)
    <div @class(['flex gap-2'])>
        <div @class(['text-red-700/75 dark:text-red-300/75', 'h-4 min-w-fit'])>
            <x-icon>
                <x-icon.error />
            </x-icon>
        </div>
        <p @class(['text-red-700/75 dark:text-red-300/75', 'text-xs'])>{{ $message }}</p>
    </div>
@enderror
