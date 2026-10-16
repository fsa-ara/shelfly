<x-app title="{{ __('auth/forgot-password.title') }}">
    <x-card.auth>
        <div @class(['mb-2'])>
            <x-typography.heading level="1"
                                  content="{{ __('auth/forgot-password.heading') }}" />
        </div>
        <div @class(['mb-16 text-center'])>
            <p>{{ __('auth/forgot-password.description.subtitle') }}</p>
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
                                  label="{{ __('auth/forgot-password.input.label.email') }}"
                                  :isInvalid="$errors->has('email')" />
                    <div @class(['h-8'])>
                        <x-form.error type="email" />
                    </div>
                </div>
            </x-form>
        </div>
        <div>
            <x-button.primary form="forgot-password-form"
                              type="submit"
                              text="{{ __('auth/forgot-password.button.submit') }}" />
        </div>
        <div @class(['mt-8 text-center'])>
            <x-nav.link href="{{ route('login') }}"
                        text="{{ __('auth/forgot-password.link.sign_in') }}" />
        </div>
    </x-card.auth>
</x-app>
