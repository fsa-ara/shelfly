<div @class(['relative'])>
    <input aria-required="{{ $attributes['required'] ? 'true' : 'false' }}"
           placeholder=""
           {{ $attributes }}
           @class([
               'peer',
               'focus:outline-sky-500',
               'border h-16 pt-4 px-4 rounded-2xl w-full',
               'focus:outline-1 focus:outline-offset-2',
               'bg-transparent' => !$hasError,
               'border-slate-300 dark:border-slate-700' => !$hasError,
               'bg-red-100/25 dark:bg-red-900/25' => $hasError,
               'border-red-300/75 dark:border-red-700/75' => $hasError,
           ])>
    <label for="{{ $attributes['id'] }}"
           @class([
               'absolute flex h-1/2 items-center left-4 top-0',
               'text-xs translate-y-0',
               'peer-focus:text-xs peer-focus:translate-y-0',
               'peer-placeholder-shown:text-base peer-placeholder-shown:translate-y-1/2',
               'transition-[font-size,_translate] duration-250 ease-[cubic-bezier(0.5,_0,_0.25,_1)] delay-0',
               'text-slate-500' => !$hasError,
               'text-red-700/75 dark:text-red-300/75' => $hasError,
           ])>{{ $label }}</label>
</div>
