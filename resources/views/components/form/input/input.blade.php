@switch($type)
    @case('email')
    @case('password')

    @case('text')
        <x-form.input.field :label="$label"
                            {{ $attributes }} />
    @break

    @case('checkbox')
        <x-form.input.checkbox :label="$label"
                               {{ $attributes }} />
    @break

    @default
        <input aria-required="{{ $attributes['required'] ? 'true' : 'false' }}"
               {{ $attributes }}>
@endswitch
