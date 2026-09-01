<x-app>
    <div @class([
        'col-span-full',
        'sm:col-start-2 sm:col-end-8',
        'lg:col-start-3 lg:col-end-11',
    ])>
        <div @class([
            'grid items-center justify-center size-full',
            'grid-cols-[100%] opacity-100 scale-100',
            'starting:grid-cols-[2rem] starting:opacity-0 starting:scale-25',
            'transition-[grid-template-columns,_opacity,_scale] duration-750 ease-[cubic-bezier(0.5,_0,_0.25,_1)] delay-[375ms,_0ms,_0ms]',
        ])>
            <x-banner.warning heading="{{ $heading }}"
                              description="{{ $description }}" />
        </div>
    </div>
</x-app>
