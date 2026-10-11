@switch($type)
    @case('email')
    @case('password')
        <x-form.input.field {{ $attributes }} />
    @break

    @case('checkbox')
        <x-form.input.checkbox {{ $attributes }} />
    @break

    @default
        <input aria-required="{{ $attributes['required'] ? 'true' : 'false' }}"
               {{ $attributes }}>
@endswitch
