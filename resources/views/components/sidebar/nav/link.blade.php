<a href="{{ route($route) }}"
   aria-current="{{ request()->routeIs($route) ? 'page' : 'false' }}"
   {{ $attributes }}
   @class([
       'text-sky-400 dark:text-sky-600' => request()->routeIs($route),
       'focus:outline-sky-500',
       'hover:bg-sky-50 dark:hover:bg-sky-950',
       'hover:text-sky-700 dark:hover:text-sky-300',
       'flex gap-4 h-12 items-center pl-2 rounded-lg w-full',
       'pointer-events-none' => request()->routeIs($route),
       'focus:outline-1',
   ])>
    <div @class(['aspect-square h-6'])>
        <x-icon :component="$icon" />
    </div>
    {{ $text }}
</a>
