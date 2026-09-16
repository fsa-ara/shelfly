<x-app title="Reset Password">
    @php
        $hasError = $errors->has('email');
    @endphp
    <x-layout.auth>
        <x-heading level="1"
                   content="Reset Password" />
        <p @class(['my-8 text-center'])>Enter your new password.</p>
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
            <div @class(['flex flex-col gap-2'])>
                <x-form.input id="reset-password-password-field"
                              name="password"
                              type="password"
                              required
                              label="Password"
                              :hasError="$hasError" />
                <x-form.input id="reset-password-password-confirmation-field"
                              name="password_confirmation"
                              type="password"
                              required
                              label="Password confirmation"
                              :hasError="$hasError" />
                <div @class(['h-24'])>
                    <x-form.error type="email" />
                </div>
            </div>
            <x-form.button form="reset-password-form"
                           type="submit"
                           text="Continue" />
        </x-form>
    </x-layout.auth>
</x-app>
