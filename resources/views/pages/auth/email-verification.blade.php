<x-app title="{{ __('pages/auth/email-verification.title') }}">
    <x-layout.account>
        <x-heading level="1"
                   content="{{ __('pages/auth/email-verification.heading') }}" />
        <p @class(['my-8 text-center'])>{{ __('pages/auth/email-verification.description') }}</p>
        <x-form id="email-verification-form"
                action="{{ route('verification.send') }}"
                method="post">
            <div @class(['h-24'])>
                <x-form.error type="email" />
            </div>
            <x-form.button form="email-verification-form"
                           type="submit"
                           text="{{ __('pages/auth/email-verification.form.button') }}" />
        </x-form>
    </x-layout.account>
</x-app>
