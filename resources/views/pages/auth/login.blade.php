<x-app title="{{ __('pages/auth/login.title') }}">
    @php
        $hasError = $errors->has('email');
    @endphp
    <x-layout.account>
        <x-heading level="1"
                   content="{{ __('pages/auth/login.heading') }}" />
        <p @class(['my-8 text-center'])>{{ __('pages/auth/login.description') }}</p>
        <x-form id="sign-in-form"
                action="{{ route('login') }}"
                method="post">
            <div @class(['flex flex-col gap-2'])>
                <x-form.input id="sign-in-email-field"
                              name="email"
                              type="email"
                              value="{{ old('email') }}"
                              autocomplete="username"
                              required
                              label="{{ __('pages/auth/login.form.input.email') }}"
                              :hasError="$hasError" />
                <x-form.input id="sign-in-password-field"
                              name="password"
                              type="password"
                              required
                              label="{{ __('pages/auth/login.form.input.password') }}"
                              :hasError="$hasError" />
                <div @class(['h-24'])>
                    <x-form.error type="email" />
                </div>
            </div>
            <div @class(['flex justify-center mb-8'])>
                <x-form.input id="sign-in-remember-me-checkbox"
                              name="remember-me"
                              type="checkbox"
                              label="{{ __('pages/auth/login.form.input.remember_me') }}" />
            </div>
            <x-form.button form="sign-in-form"
                           type="submit"
                           text="{{ __('pages/auth/login.form.button') }}" />
        </x-form>
        <div @class(['my-8 text-center'])>
            <x-nav.link href="{{ route('password.request') }}"
                        text="{{ __('pages/auth/login.forgot_password.link') }}" />
        </div>
        <div @class(['flex flex-wrap gap-x-2 justify-center px-4'])>
            <p>{{ __('pages/auth/login.register.description') }}</p>
            <x-nav.link href="{{ route('register') }}"
                        text="{{ __('pages/auth/login.register.link') }}" />
        </div>
    </x-layout.account>
</x-app>
