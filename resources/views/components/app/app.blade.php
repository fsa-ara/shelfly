<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <x-app.head title="{{ $title ? $title . ' | ' . config('app.name') : config('app.name') }}" />

    <body @class([
        'bg-slate-100 dark:bg-slate-900',
        'text-slate-700 dark:text-slate-300',
        'font-[Montserrat,_sans-serif] h-dvh overflow-hidden',
    ])>
        <x-toast />
        <x-layout.main>{{ $slot }}</x-layout.main>
    </body>

</html>
