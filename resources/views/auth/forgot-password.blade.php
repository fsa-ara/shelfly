<x-app title="Forgot password">
    <x-card.auth>
        <div @class(['mb-2'])>
            <x-typography.heading level="1"
                                  content="{{ 'Forgot password' }}" />
        </div>
        <div @class(['mb-16 text-center'])>
            <p>Enter your email address to receive password reset instructions.</p>
        </div>
        <div @class(['mb-8'])>
            <x-form id="forgot-password-form"
                    action="{{ route('password.email') }}"
                    method="post">
                <div @class(['flex flex-col gap-4 mb-4'])>
                    <x-form.input id="forgot-password-email-field"
                                  name="email"
                                  type="email"
                                  value="{{ old('email') }}"
                                  autocomplete="username"
                                  required
                                  label="{{ 'Enter your email' }}"
                                  :isInvalid="$errors->has('email')" />
                    <div @class(['h-8'])>
                        <x-form.error type="email" />
                    </div>
                </div>
            </x-form>
        </div>
        <div>
            <x-form.button form="forgot-password-form"
                           type="submit"
                           text="{{ 'Send' }}" />
        </div>
        <div @class(['mt-8 text-center'])>
            <x-nav.link href="{{ route('login') }}"
                        text="{{ 'Back to sign in' }}" />
        </div>
    </x-card.auth>
</x-app>
