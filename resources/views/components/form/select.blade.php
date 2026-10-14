<div @class(['relative'])>
    <select aria-required="{{ $attributes['required'] ? 'true' : 'false' }}"
            {{ $attributes }}
            @class([
                'peer',
                'border-slate-300 dark:border-slate-700' => !$isInvalid,
                'border-red-300 dark:border-red-700' => $isInvalid,
                'focus:border-sky-300 dark:focus:border-sky-700',
                'border-b h-12 outline-none pt-4 w-full',
            ])>{{ $slot }}</select>
    <label for="{{ $attributes['id'] }}"
           @class([
               'text-slate-500' => !$isInvalid,
               'text-red-700 dark:text-red-300' => $isInvalid,
               'peer-focus:text-sky-700 dark:peer-focus:text-sky-300',
               'absolute cursor-text flex h-1/2 items-center text-xs top-0 translate-y-0',
           ])>{{ $label }}</label>
</div>
