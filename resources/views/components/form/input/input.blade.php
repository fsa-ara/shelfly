@switch($type)
    @case('email')
    @case('password')
        <x-form.input.generic {{ $attributes }} />
    @break

    @case('checkbox')
        <x-form.input.checkbox {{ $attributes }} />
    @break
@endswitch
