<div id="warning-banner"
     @class([
         'bg-white dark:bg-black',
         'shadow-slate-300 dark:shadow-slate-700',
         'flex flex-col items-center overflow-hidden relative rounded-2xl shadow-2xl',
     ])>
    <div @class(['flex flex-col gap-8 items-center py-8 w-3xs'])>
        <h1 @class([
            'bg-slate-300 dark:bg-slate-700',
            'flex font-bold items-center px-8 py-2 rounded-full',
        ])>{{ $heading }}</h1>
        <p @class(['text-center'])>{{ $description }}</p>
    </div>
    @for ($i = 0; $i < 2; $i++)
        <div @class([
            'bg-amber-500',
            'text-black',
            'absolute top-0 w-4 z-10',
            'nth-of-type-2:left-0',
            'nth-of-type-3:right-0',
        ])>
            <div @class(['-translate-y-2' => $i === 0])>
                @for ($j = 0; $j < 99; $j++)
                    <x-icon>
                        <x-icon.stripe />
                    </x-icon>
                @endfor
            </div>
        </div>
    @endfor
</div>
