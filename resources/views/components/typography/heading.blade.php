@switch($level)
    @case(1)
        <h1 @class(['font-bold text-2xl text-center'])>{{ $content }}</h1>
    @break

    @case(2)
        <h2 @class(['font-bold text-xl text-center'])>{{ $content }}</h2>
    @break

    @case(3)
        <h3 @class(['font-bold text-base text-center'])>{{ $content }}</h3>
    @break
@endswitch
