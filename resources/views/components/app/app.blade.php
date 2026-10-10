<!DOCTYPE html>
<html lang="en">

    <x-app.head title="{{ $title ? $title . ' | ' . config('app.name') : config('app.name') }}" />

    <body @class([
        'bg-slate-100 dark:bg-slate-900',
        'text-slate-700 dark:text-slate-300',
        'font-[Montserrat,_sans-serif] h-dvh overflow-hidden',
    ])>
        @session('status')
            <p>{{ $value }}</p>
        @endsession
        <main @class(['overflow-y-scroll size-full'])>{{ $slot }}</main>
    </body>

</html>
