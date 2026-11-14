<div @class(['relative'])>
    <div @class(['size-48'])>
        <input aria-required="{{ $attributes['required'] ? 'true' : 'false' }}"
               {{ $attributes }}
               @class(['sr-only'])>
        <label data-dropzone
               data-dragging="false"
               for="{{ $attributes['id'] }}"
               @class([
                   'border-slate-500' => !$isInvalid,
                   'border-red-300 dark:border-red-700' => $isInvalid,
                   'text-slate-700 dark:text-slate-300',
                   'hover:bg-sky-100 dark:hover:bg-sky-900',
                   'hover:border-sky-500',
                   'data-[dragging=true]:bg-sky-100 dark:data-[dragging=true]:bg-sky-900',
                   'data-[dragging=true]:border-sky-500',
                   'border-4 border-dashed cursor-pointer flex flex-col gap-4 justify-center p-4 rounded-4xl size-full',
               ])>
            <div @class(['h-12 w-full'])>
                <x-icon component="icon.upload"
                        viewBox="0 0 24 24" />
            </div>
            <div @class(['flex flex-col items-center text-center text-xs'])>
                <span @class(['mb-4'])>{{ __('components/drag-and-drop.description.info') }}</span>
                <span @class(['font-bold'])>{{ __('components/drag-and-drop.description.file_format') }}</span>
            </div>
        </label>
        <div data-preview
             @class(['absolute hidden size-full top-0'])>
            <img @class([
                'bg-slate-200 dark:bg-slate-800',
                'object-contain p-4 rounded-4xl size-48',
            ])>
            <button type="button"
                    @class([
                        'bg-white dark:bg-black',
                        'focus:outline-sky-500',
                        'hover:bg-red-400 dark:hover:bg-red-600',
                        'hover:text-white',
                        'absolute aspect-square bottom-0 cursor-pointer h-12 m-2 p-2 right-0 rounded-full',
                        'focus:outline-1',
                    ])>
                <x-icon component="icon.delete"
                        viewBox="0 0 24 24" />
            </button>
        </div>
    </div>
</div>
