@session('status')
    <div data-toast
         @class([
             'fixed flex gap-4 inset-x-4 mx-auto',
             'opacity-0 translate-y-4',
             'starting:data-toast:opacity-0 starting:data-toast:translate-y-0',
             'data-toast:opacity-100 data-toast:translate-y-4',
             'transition-[opacity,_translate] duration-500 ease-[cubic-bezier(0.5,_0,_0.25,_1)] delay-0',
             'data-toast:delay-[125ms,_0ms]',
             'sm:w-sm',
             'lg:left-64 lg:right-0',
         ])>
        <div @class([
            'bg-black',
            'shadow-slate-400 dark:shadow-slate-600',
            'text-lime-500' => array_key_exists('success', $value),
            'text-red-500' => array_key_exists('error', $value),
            'aspect-square h-8 p-1 rounded-full shadow-lg',
        ])>
            <x-icon component="icon.countdown"
                    dur="3750" />
        </div>
        <div @class([
            'bg-black',
            'shadow-slate-400 dark:shadow-slate-600',
            'text-lime-500' => array_key_exists('success', $value),
            'text-red-500' => array_key_exists('error', $value),
            'px-4 py-2 rounded-2xl shadow-lg w-full',
        ])>
            @foreach ($value as $type => $message)
                <p @class(['text-xs'])>{{ __($message) }}</p>
            @endforeach
        </div>
    </div>
@endsession
