<x-app>
    @php
        $hasError = $errors->has('email');
    @endphp
    <div @class([
        'bg-white dark:bg-black',
        'col-span-full -mx-4 overflow-y-scroll',
    ])>
        <div @class(['px-4 py-16 mx-auto', 'sm:max-w-sm', 'lg:mt-12'])>
            <x-heading level="1"
                       content="Forgot Password" />
            <p @class(['my-8 text-center'])>Enter the email address associated with you account so we can send you instructions on how to reset you password.</p>
            <x-form id="forgot-password-form"
                    action="{{ route('auth.forgot-password') }}"
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
        </div>
    </div>
</x-app>
