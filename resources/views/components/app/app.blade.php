<!DOCTYPE html>
<html lang="en">

    <x-app.head title="{{ $title ? $title . ' | ' . config('app.name') : config('app.name') }}" />

    <body>
        <main>{{ $slot }}</main>
    </body>

</html>
