<!DOCTYPE html>
<html lang="en">

    <x-app.head title="{{ $title ? $title . ' | ' . config('app.name') : config('app.name') }}" />

    <body>
        @session('status')
            <p>{{ $value }}</p>
        @endsession
        <main>{{ $slot }}</main>
    </body>

</html>
