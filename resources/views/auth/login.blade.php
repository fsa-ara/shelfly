<x-app title="{{ __('auth/login.title') }}">
    <x-card.auth>
        <div @class(['mb-2'])>
            <x-typography.heading level="1"
                                  content="{{ __('auth/login.heading') }}" />
        </div>
        <div @class(['mb-16 text-center'])>
            <p>{{ __('auth/login.description.subtitle', ['app' => config('app.name')]) }}</p>
        </div>
        <div @class(['mb-8'])>
            <x-form id="sign-in-form"
                    action="{{ route('login.authenticate') }}"
                    method="post">
                <div @class(['flex flex-col gap-4 mb-4'])>
                    <x-form.input id="sign-in-email-field"
                                  name="email"
                                  type="email"
                                  value="{{ old('email') }}"
                                  autocomplete="username"
                                  required
                                  label="{{ __('auth/login.input.label.email') }}"
                                  :isInvalid="$errors->has('email')" />
                    <x-form.input id="sign-in-password-field"
                                  name="password"
                                  type="password"
                                  required
                                  label="{{ __('auth/login.input.label.password') }}"
                                  :isInvalid="$errors->has('email')" />
                    <div @class(['h-8'])>
                        <x-form.error type="email" />
                    </div>
                </div>
                <div @class(['flex justify-center'])>
                    <x-form.input id="sign-in-remember-me-checkbox"
                                  name="remember_me"
                                  type="checkbox"
                                  label="{{ __('auth/login.input.label.remember_me') }}" />
                </div>
            </x-form>
        </div>
        <div>
            <x-button.primary form="sign-in-form"
                              type="submit"
                              text="{{ __('auth/login.button.submit') }}" />
        </div>
        <div @class(['my-8 text-center'])>
            <x-nav.link href="{{ route('password.request') }}"
                        text="{{ __('auth/login.link.forgot_password') }}" />
        </div>
        <div @class(['flex flex-col gap-2 items-center'])>
            <p>{{ __('auth/login.description.sign_up', ['app' => config('app.name')]) }}</p>
            <x-nav.link href="{{ route('register') }}"
                        text="{{ __('auth/login.link.sign_up') }}" />
        </div>
    </x-card.auth>
</x-app>
