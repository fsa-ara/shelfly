<div @class(['flex gap-2 items-center'])>
    <input {{ $attributes }}
           @class([
               'border-slate-700 dark:border-slate-300',
               'checked:border-sky-500',
               'checked:after:bg-sky-500',
               'focus:outline-sky-500',
               'appearance-none border flex items-center justify-center rounded-full size-4',
               'after:absolute after:invisible after:rounded-full after:size-2',
               'checked:after:visible',
               'focus:outline-1 focus:outline-offset-2',
           ])>
    <label for="{{ $attributes['id'] }}">{{ $label }}</label>
</div>
