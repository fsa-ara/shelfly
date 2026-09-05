<x-app>
    @php
        $hasError = $errors->has('email');
    @endphp
    <div @class([
        'bg-white dark:bg-black',
        'col-span-full -mx-4 overflow-y-scroll',
    ])>
        <div @class(['px-4 py-16 mx-auto', 'sm:max-w-sm', 'lg:max-x-lg lg:mt-12'])>
            <x-heading level="1"
                       content="Sign In" />
            <p @class(['my-8 text-center'])>Sign in to your {{ config('app.name') }} account to access all services.</p>
            <x-form id="sign-in-form"
                    action="{{ route('auth.login') }}"
                    method="post">
                <div @class(['flex flex-col gap-2'])>
                    <x-form.input id="sign-in-email-field"
                                  name="email"
                                  type="email"
                                  value="{{ old('email') }}"
                                  autocomplete="username"
                                  required
                                  label="Email"
                                  :hasError="$hasError" />
                    <x-form.input id="sign-in-password-field"
                                  name="password"
                                  type="password"
                                  required
                                  label="Password"
                                  :hasError="$hasError" />
                    <div @class(['h-24'])>
                        <x-form.error type="email" />
                    </div>
                </div>
                <div @class(['flex justify-center mb-8'])>
                    <x-form.input id="sign-in-remember-me-checkbox"
                                  name="remember-me"
                                  type="checkbox"
                                  label="Remember me" />
                </div>
                <x-form.button form="sign-in-form"
                               type="submit"
                               text="Sign In" />
            </x-form>
            <div @class(['my-8 text-center'])>
                <x-nav.link href=""
                            text="Forgot your password?" />
            </div>
            <div @class(['flex flex-wrap gap-x-2 justify-center px-4'])>
                <p>Don't have a {{ config('app.name') }} account?</p>
                <x-nav.link href="{{ route('auth.register') }}"
                            text="Create a {{ config('app.name') }} account" />
            </div>
        </div>
    </div>
</x-app>
