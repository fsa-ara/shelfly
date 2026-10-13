<x-app title="Reset password">
    <x-card.auth>
        <div @class(['mb-2'])>
            <x-typography.heading level="1"
                                  content="{{ 'Reset password' }}" />
        </div>
        <div @class(['mb-16 text-center'])>
            <p>Enter your new password below to complete the password reset.</p>
        </div>
        <div @class(['mb-8'])>
            <x-form id="reset-password-form"
                    action="{{ route('password.update') }}"
                    method="post">
                <x-form.input name="token"
                              type="hidden"
                              value="{{ request('token') }}"
                              required />
                <x-form.input name="email"
                              type="hidden"
                              value="{{ request('email') }}"
                              required />
                <div @class(['flex flex-col gap-4 mb-4'])>
                    <x-form.input id="reset-password-password-field"
                                  name="password"
                                  type="password"
                                  required
                                  label="{{ 'Enter your new password' }}"
                                  :isInvalid="$errors->has('password')" />
                    <x-form.input id="reset-password-password-confirmation-field"
                                  name="password_confirmation"
                                  type="password"
                                  required
                                  label="{{ 'Confirm your new password' }}"
                                  :isInvalid="$errors->has('password')" />
                    <div @class(['h-8'])>
                        <x-form.error type="email" />
                        <x-form.error type="password" />
                    </div>
                </div>
            </x-form>
        </div>
        <div>
            <x-button.primary form="reset-password-form"
                              type="submit"
                              text="{{ 'Update' }}" />
        </div>
        <div @class(['mt-8 text-center'])>
            <x-nav.link href="{{ route('password.request') }}"
                        text="{{ 'Request a new password reset link' }}" />
        </div>
    </x-card.auth>
</x-app>
