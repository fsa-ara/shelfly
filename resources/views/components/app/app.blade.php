<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <x-app.head :title="$title ? $title . ' | ' . config('app.name') : config('app.name')" />

    <body @class([
        'bg-slate-100 dark:bg-slate-900',
        'text-slate-700 dark:text-slate-300',
        'font-[Montserrat,_sans-serif]',
    ])>
        <div @class([
            'h-dvh',
            'grid grid-cols-1 grid-rows-[3rem_1fr]',
            'lg:overflow-hidden',
            'lg:grid-cols-[16rem_1fr]',
        ])>
            <x-header />
            <x-sidebar />
            <div @class([
                'flex flex-col justify-between overflow-y-scroll',
                'col-start-1 row-start-2',
                'lg:col-start-2 lg:row-start-1 lg:row-span-full',
            ])>
                <x-toast />
                <main @class(['px-4 h-min', 'sm:py-12'])>{{ $slot }}</main>
                <x-footer />
            </div>
        </div>
    </body>

</html>
