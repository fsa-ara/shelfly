<x-app title="{{ __('pages/auth/forgot-password.title') }}">
    @php
        $hasError = $errors->has('email');
    @endphp
    <x-layout.account>
        <x-heading level="1"
                   content="{{ __('pages/auth/forgot-password.heading') }}" />
        <p @class(['my-8 text-center'])>{{ __('pages/auth/forgot-password.description') }}</p>
        <x-form id="forgot-password-form"
                action="{{ route('password.request') }}"
                method="post">
            <div @class(['flex flex-col gap-2'])>
                <x-form.input id="forgot-password-email-field"
                              name="email"
                              type="email"
                              value="{{ old('email') }}"
                              autocomplete="username"
                              required
                              label="{{ __('pages/auth/forgot-password.form.input.email') }}"
                              :hasError="$hasError" />
                <div @class(['h-24'])>
                    <x-form.error type="email" />
                </div>
            </div>
            <x-form.button form="forgot-password-form"
                           type="submit"
                           text="{{ __('pages/auth/forgot-password.form.button') }}" />
        </x-form>
    </x-layout.account>
</x-app>
