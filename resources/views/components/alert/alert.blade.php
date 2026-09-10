@session('status')
    <div id="alert"
         @class([
             'bg-slate-100 dark:bg-slate-900',
             'absolute inset-x-4 mx-auto pl-2 pr-4 py-2 rounded-2xl top-4 z-10',
             'opacity-0 -translate-y-1/4',
             '[.is-visible]:opacity-100 [.is-visible]:translate-y-0',
             'transition-[opacity,_translate] duration-750 ease-[cubic-bezier(0.5,_0,_0.25,_1)] delay-0',
             'sm:max-w-sm',
         ])>
        <div @class(['flex gap-4'])>
            <div @class(['h-4 min-w-fit'])>
                <x-icon>
                    <x-icon.countdown dur="3750ms" />
                </x-icon>
            </div>
            <p @class(['text-xs'])>{{ $value }}</p>
        </div>
    </div>
@endsession
