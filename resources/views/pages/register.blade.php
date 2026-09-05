<x-app>
    @php
        $hasEmailError = $errors->has('email');
        $hasPasswordError = $errors->has('password');
    @endphp
    <div @class([
        'bg-white dark:bg-black',
        'col-span-full -mx-4 overflow-y-scroll',
    ])>
        <div @class(['px-4 py-16 mx-auto', 'sm:max-w-sm', 'lg:max-x-lg lg:mt-12'])>
            <x-heading level="1"
                       content="Sign Up" />
            <p @class(['my-8 text-center'])>Sign up your {{ config('app.name') }} account to access all services.</p>
            <x-form id="sign-up-form"
                    action="{{ route('auth.register') }}"
                    method="post">
                <div @class(['flex flex-col gap-2'])>
                    <x-form.input id="sign-up-email-field"
                                  name="email"
                                  type="email"
                                  value="{{ old('email') }}"
                                  autocomplete="username"
                                  required
                                  label="Email"
                                  :hasError="$hasEmailError" />
                    <x-form.input id="sign-up-password-field"
                                  name="password"
                                  type="password"
                                  required
                                  label="Password"
                                  :hasError="$hasPasswordError" />
                    <x-form.input id="sign-up-password-confirmation-field"
                                  name="password_confirmation"
                                  type="password"
                                  required
                                  label="Password confirmation"
                                  :hasError="$hasPasswordError" />
                    <div @class(['h-24'])>
                        <x-form.error type="email" />
                        <x-form.error type="password" />
                    </div>
                </div>
                <x-form.button form="sign-up-form"
                               type="submit"
                               text="Sign Up" />
            </x-form>
            <div @class(['flex flex-wrap gap-x-2 justify-center my-8 px-4'])>
                <p>Do you already have a {{ config('app.name') }} account?</p>
                <x-nav.link href="{{ route('auth.login') }}"
                            text="Sign in" />
            </div>
        </div>
    </div>
</x-app>
