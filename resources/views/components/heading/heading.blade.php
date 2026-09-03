@php
    $classes = 'font-bold text-center';
@endphp

@switch($level)
    @case(1)
        <h1 @class([$classes, 'text-3xl'])>{{ $content }}</h1>
    @break

    @case(2)
        <h2 @class([$classes, 'text-2xl'])>{{ $content }}</h2>
    @break

    @case(3)
        <h3 @class([$classes, 'text-xl'])>{{ $content }}</h3>
    @break
@endswitch
