<x-app title="{{ __('pages/auth/reset-password.title') }}">
    @php
        $hasError = $errors->has('email');
    @endphp
    <x-layout.account>
        <x-heading level="1"
                   content="{{ __('pages/auth/reset-password.title') }}" />
        <p @class(['my-8 text-center'])>{{ __('pages/auth/reset-password.description') }}</p>
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
                              label="{{ __('pages/auth/reset-password.form.input.password') }}"
                              :hasError="$hasError" />
                <x-form.input id="reset-password-password-confirmation-field"
                              name="password_confirmation"
                              type="password"
                              required
                              label="{{ __('pages/auth/reset-password.form.input.password_confirmation') }}"
                              :hasError="$hasError" />
                <div @class(['h-24'])>
                    <x-form.error type="email" />
                </div>
            </div>
            <x-form.button form="reset-password-form"
                           type="submit"
                           text="{{ __('pages/auth/reset-password.form.button') }}" />
        </x-form>
    </x-layout.account>
</x-app>
