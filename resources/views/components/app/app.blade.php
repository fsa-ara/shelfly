@props([
    'title' => null,
    'appName' => config('app.name'),
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <x-app.head title="{{ $title ? $title . ' - ' . $appName : $appName }}" />

    <body @class([
        'bg-slate-100 dark:bg-slate-900',
        'text-slate-700 dark:text-slate-300',
        'font-[Montserrat] h-dvh overflow-hidden',
    ])>
        <x-grid.app>
            <x-slot:header>
                <header @class(['bg-white dark:bg-black', 'sticky size-full z-50'])>HEADER</header>
            </x-slot>
            <x-slot:sidebar>
                <aside @class(['bg-white dark:bg-black', 'sticky size-full z-40', 'hidden'])>SIDEBAR</aside>
            </x-slot>
            <x-slot:content>
                <main @class(['size-full'])>CONTENT</main>
            </x-slot>
        </x-grid.app>
    </body>

</html>
