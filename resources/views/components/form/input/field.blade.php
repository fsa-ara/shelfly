<div @class(['relative'])>
    <input aria-required="{{ $attributes['required'] ? 'true' : 'false' }}"
           placeholder=""
           {{ $attributes }}
           @class([
               'peer',
               'border-slate-300 dark:border-slate-700' => !$isInvalid,
               'border-red-300 dark:border-red-700' => $isInvalid,
               'focus:border-sky-300 dark:focus:border-sky-700',
               'border-b h-12 outline-none pt-4 w-full',
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
</div>
