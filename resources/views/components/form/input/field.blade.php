<div @class(['relative'])>
    <input aria-required="{{ $attributes['required'] ? 'true' : 'false' }}"
           placeholder=" "
           {{ $attributes }}
           @class([
               'peer',
               'border-slate-300 dark:border-slate-700' => !$isInvalid,
               'border-red-300 dark:border-red-700' => $isInvalid,
               'focus:border-sky-300 dark:focus:border-sky-700',
               'border-b h-12 outline-none pt-4 w-full',
               '[[type=number]]:[appearance:_textfield] [[type=number]]:m-0 [[type=number]]:pr-8',
               '[[type=number]::-webkit-inner-spin-button]:appearance-none',
           ])>
    <label for="{{ $attributes['id'] }}"
           @class([
               'text-slate-500' => !$isInvalid,
               'text-red-700 dark:text-red-300' => $isInvalid,
               'peer-focus:text-sky-700 dark:peer-focus:text-sky-300',
               'absolute cursor-text flex h-1/2 items-center top-0',
               'text-xs translate-y-0',
               'peer-focus:text-xs peer-focus:translate-y-0',
               'peer-placeholder-shown:text-base peer-placeholder-shown:translate-y-1/2',
               'transition-[font-size,_translate] duration-250 ease-[cubic-bezier(0.5,_0,_0.25,_1)] delay-0',
           ])>{{ $label }}</label>
    @if ($type === 'number')
        <div @class(['absolute aspect-square h-full pt-4 right-0 top-0 w-8'])>
            <div @class(['flex flex-col py-0.5 size-full'])>
                @foreach (['up', 'down'] as $dir)
                    <button data-arrow="{{ $dir }}"
                            type="button"
                            @class([
                                'focus:outline-sky-500',
                                'hover:bg-slate-300 dark:hover:bg-slate-700',
                                'cursor-pointer h-1/2 rounded-sm w-full',
                                'focus:outline-1',
                            ])>
                        <x-icon component="icon.keyboard-arrow-{{ $dir }}" />
                    </button>
                @endforeach
            </div>
        </div>
    @endif
</div>
