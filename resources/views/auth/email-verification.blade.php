<x-app title="{{ __('auth/email-verification.title') }}">
    <x-card.auth>
        <div @class(['mb-2'])>
            <x-typography.heading level="1"
                                  content="{{ __('auth/email-verification.heading') }}" />
        </div>
        <div @class(['mb-16 text-center'])>
            <p>{{ __('auth/email-verification.description.subtitle', ['app' => config('app.name')]) }}</p>
        </div>
        <div @class(['mb-8'])>
            <x-form id="email-verification-form"
                    action="{{ route('verification.send') }}"
                    method="post">
                <div @class(['h-16'])>
                    <x-form.error type="email" />
                </div>
            </x-form>
        </div>
        <div>
            <x-button.primary form="email-verification-form"
                              type="submit"
                              text="{{ __('auth/email-verification.button.submit') }}" />
        </div>
    </x-card.auth>
</x-app>
