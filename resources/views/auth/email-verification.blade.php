<x-app title="Email verification">
    <x-card.auth>
        <div @class(['mb-2'])>
            <x-typography.heading level="1"
                                  content="{{ 'Email verification' }}" />
        </div>
        <div @class(['mb-16 text-center'])>
            <p>A verification email has been sent to your inbox. Please click the link to verify your {{ config('app.name') }} account.</p>
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
                              text="{{ 'Send' }}" />
        </div>
    </x-card.auth>
</x-app>
