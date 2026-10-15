<dialog {{ $attributes }}
        @class([
            'bg-white dark:bg-black',
            'text-current',
            'shadow-slate-400 dark:shadow-slate-600',
            'm-auto outline-none overflow-visible p-8 rounded-2xl shadow-lg w-full',
            'opacity-0 scale-75',
            'open:opacity-100 open:scale-100',
            'starting:open:opacity-0 starting:open:scale-75',
            'transition-[display,_opacity,_overlay,_scale] duration-250 ease-[cubic-bezier(0.5,_0,_0.25,_1)] delay-0 transition-discrete',
            'backdrop:bg-transparent',
            'open:backdrop:bg-slate-500/50',
            'starting:open:backdrop:bg-transparent',
            'backdrop:backdrop-blur-none',
            'open:backdrop:backdrop-blur-lg',
            'starting:open:backdrop:backdrop-blur-none',
            'backdrop:transition-[backdrop-filter,_background] backdrop:duration-250 backdrop:ease-[cubic-bezier(0.5,_0,_0.25,_1)] backdrop:delay-0',
            'sm:w-sm',
        ])>{{ $slot }}</dialog>
