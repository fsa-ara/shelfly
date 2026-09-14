<x-app title="Sign Up">
    @php
        $hasEmailError = $errors->has('email');
        $hasPasswordError = $errors->has('password');
    @endphp
    <x-layout.auth>
        <x-heading level="1"
                   content="Sign Up" />
        <p @class(['my-8 text-center'])>Sign up your {{ config('app.name') }} account to access all services.</p>
        <x-form id="sign-up-form"
                action="{{ route('register') }}"
                method="post">
            <div @class(['flex flex-col gap-2'])>
                <x-form.input id="sign-up-email-field"
                              name="email"
                              type="email"
                              value="{{ old('email') }}"
                              autocomplete="username"
                              required
                              label="Email"
                              :hasError="$hasEmailError" />
                <x-form.input id="sign-up-password-field"
                              name="password"
                              type="password"
                              required
                              label="Password"
                              :hasError="$hasPasswordError" />
                <x-form.input id="sign-up-password-confirmation-field"
                              name="password_confirmation"
                              type="password"
                              required
                              label="Password confirmation"
                              :hasError="$hasPasswordError" />
                <div @class(['h-24'])>
                    <x-form.error type="email" />
                    <x-form.error type="password" />
                </div>
            </div>
            <x-form.button form="sign-up-form"
                           type="submit"
                           text="Sign Up" />
        </x-form>
        <div @class(['flex flex-wrap gap-x-2 justify-center my-8 px-4'])>
            <p>Do you already have a {{ config('app.name') }} account?</p>
            <x-nav.link href="{{ route('login') }}"
                        text="Sign in" />
        </div>
    </x-layout.auth>
</x-app>
