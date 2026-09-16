<x-app title="Forgot Password">
    @php
        $hasError = $errors->has('email');
    @endphp
    <x-layout.auth>
        <x-heading level="1"
                   content="Forgot Password" />
        <p @class(['my-8 text-center'])>Enter the email address associated with you account so we can send you instructions on how to reset you password.</p>
        <x-form id="forgot-password-form"
                action="{{ route('password.request') }}"
                method="post">
            <div @class(['flex flex-col gap-2'])>
                <x-form.input id="forgot-password-email-field"
                              name="email"
                              type="email"
                              value="{{ old('email') }}"
                              autocomplete="username"
                              required
                              label="Email"
                              :hasError="$hasError" />
                <div @class(['h-24'])>
                    <x-form.error type="email" />
                </div>
            </div>
            <x-form.button form="forgot-password-form"
                           type="submit"
                           text="Continue" />
        </x-form>
    </x-layout.auth>
</x-app>
