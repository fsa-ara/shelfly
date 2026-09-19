<x-app title="{{ __('pages/auth/register.title') }}">
    @php
        $hasEmailError = $errors->has('email');
        $hasPasswordError = $errors->has('password');
    @endphp
    <x-layout.account>
        <x-heading level="1"
                   content="{{ __('pages/auth/register.heading') }}" />
        <p @class(['my-8 text-center'])>{{ __('pages/auth/register.description') }}</p>
        <x-form id="sign-up-form"
                action="{{ route('register') }}"
                method="post">
            <div @class(['flex flex-col gap-2'])>
                <x-form.input id="sign-up-email-field"
                              name="email"
                              type="email"
                              value="{{ old('email') }}"
                              autocomplete="email"
                              required
                              label="{{ __('pages/auth/register.form.input.email') }}"
                              :hasError="$hasEmailError" />
                <x-form.input id="sign-up-password-field"
                              name="password"
                              type="password"
                              required
                              label="{{ __('pages/auth/register.form.input.password') }}"
                              :hasError="$hasPasswordError" />
                <x-form.input id="sign-up-password-confirmation-field"
                              name="password_confirmation"
                              type="password"
                              required
                              label="{{ __('pages/auth/register.form.input.password_confirmation') }}"
                              :hasError="$hasPasswordError" />
                <div @class(['h-24'])>
                    <x-form.error type="email" />
                    <x-form.error type="password" />
                </div>
            </div>
            <x-form.button form="sign-up-form"
                           type="submit"
                           text="{{ __('pages/auth/register.form.button') }}" />
        </x-form>
        <div @class(['flex flex-wrap gap-x-2 justify-center my-8 px-4'])>
            <p>{{ __('pages/auth/register.login.description') }}</p>
            <x-nav.link href="{{ route('login') }}"
                        text="{{ __('pages/auth/register.login.link') }}" />
        </div>
    </x-layout.account>
</x-app>
