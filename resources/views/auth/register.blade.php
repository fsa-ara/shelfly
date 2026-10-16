<x-app title="{{ __('auth/register.title') }}">
    <x-card.auth>
        <div @class(['mb-2'])>
            <x-typography.heading level="1"
                                  content="{{ __('auth/register.heading') }}" />
        </div>
        <div @class(['mb-16 text-center'])>
            <p>{{ __('auth/register.description.subheading', ['app' => config('app.name')]) }}</p>
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
                                  label="{{ __('auth/register.input.label.email') }}"
                                  :isInvalid="$errors->has('email')" />
                    <x-form.input id="sign-up-password-field"
                                  name="password"
                                  type="password"
                                  required
                                  label="{{ __('auth/register.input.label.password') }}"
                                  :isInvalid="$errors->has('password')" />
                    <x-form.input id="sign-up-password-confirmation-field"
                                  name="password_confirmation"
                                  type="password"
                                  required
                                  label="{{ __('auth/register.input.label.password_confirmation') }}"
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
                              text="{{ __('auth/register.button.submit') }}" />
        </div>
        <div @class(['flex flex-col gap-2 items-center mt-8'])>
            <p>{{ __('auth/register.description.sign_in', ['app' => config('app.name')]) }}</p>
            <x-nav.link href="{{ route('login') }}"
                        text="{{ __('auth/register.link.sign_in') }}" />
        </div>
    </x-card.auth>
</x-app>
