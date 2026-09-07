<x-app>
    @php
        $hasError = $errors->has('password');
    @endphp
    <div @class([
        'bg-white dark:bg-black',
        'col-span-full -mx-4 overflow-y-scroll',
    ])>
        <div @class(['px-4 py-16 mx-auto', 'sm:max-w-sm', 'lg:max-x-lg lg:mt-12'])>
            <x-heading level="1"
                       content="Reset Password" />
            <p @class(['my-8 text-center'])>Enter you new password.</p>
            <x-form id="reset-password-form"
                    action="{{ route('auth.reset-password', ['token' => $token]) }}"
                    method="post">
                <x-form.input name="token"
                              type="hidden"
                              value="{{ $token }}"
                              required />
                <x-form.input name="email"
                              type="hidden"
                              value="{{ session('forgot_password_email') }}"
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
                        <x-form.error type="password" />
                    </div>
                </div>
                <x-form.button form="reset-password-form"
                               type="submit"
                               text="Continue" />
            </x-form>
        </div>
    </div>
</x-app>
