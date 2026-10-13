<x-app title="Sign up">
    <x-card.auth>
        <div @class(['mb-2'])>
            <x-typography.heading level="1"
                                  content="{{ 'Sign up' }}" />
        </div>
        <div @class(['mb-16 text-center'])>
            <p>Sign up your {{ config('app.name') }} account to access all services.</p>
        </div>
        <div @class(['mb-8'])>
            <x-form id="sign-up-form"
                    action="{{ route('register.store') }}"
                    method="post">
                <div @class(['flex flex-col gap-4 mb-4'])>
                    <x-form.input id="sign-up-email-field"
                                  name="email"
                                  type="email"
                                  value="{{ old('email') }}"
                                  autocomplete="email"
                                  required
                                  label="{{ 'Enter your email' }}"
                                  :isInvalid="$errors->has('email')" />
                    <x-form.input id="sign-up-password-field"
                                  name="password"
                                  type="password"
                                  required
                                  label="{{ 'Enter your password' }}"
                                  :isInvalid="$errors->has('password')" />
                    <x-form.input id="sign-up-password-confirmation-field"
                                  name="password_confirmation"
                                  type="password"
                                  required
                                  label="{{ 'Confirm your password' }}"
                                  :isInvalid="$errors->has('password')" />
                    <div @class(['h-16'])>
                        <x-form.error type="email" />
                        <x-form.error type="password" />
                    </div>
                </div>
            </x-form>
        </div>
        <div>
            <x-button.primary form="sign-up-form"
                              type="submit"
                              text="{{ 'Sign up' }}" />
        </div>
        <div @class(['flex flex-col gap-2 items-center mt-8'])>
            <p>Do you already have a {{ config('app.name') }} account?</p>
            <x-nav.link href="{{ route('login') }}"
                        text="{{ 'Sign in' }}" />
        </div>
    </x-card.auth>
</x-app>
