<x-app title="Email Verification">
    <x-layout.auth>
        <x-heading level="1"
                   content="Email Verification" />
        <p @class(['my-8 text-center'])>Please click the link emailed to you to verify your {{ config('app.name') }} account.</p>
        <x-form id="email-verification-form"
                action="{{ route('verification.send') }}"
                method="post">
            <div @class(['h-24'])>
                <x-form.error type="email" />
            </div>
            <x-form.button form="email-verification-form"
                           type="submit"
                           text="Resend" />
        </x-form>
    </x-layout.auth>
</x-app>
