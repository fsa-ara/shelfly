<x-app title="Sign in">
    <div id="main-container"
         @class(['h-auto px-4 w-full', 'sm:mt-16'])>
        <div id="auth-card"
             @class([
                 'sm:bg-white dark:sm:bg-black',
                 'px-4 py-16',
                 'sm:mx-auto sm:px-32 sm:rounded-4xl sm:w-xl',
             ])>
            <div @class(['mb-2'])>
                <x-typography.heading level="1"
                                      content="{{ 'Sign in' }}" />
            </div>
            <div @class(['mb-16 text-center'])>
                <p>Sign in to your {{ config('app.name') }} account to access all services.</p>
            </div>
            <div @class(['mb-8'])>
                <x-form id="sign-in-form"
                        action="{{ route('login.authenticate') }}"
                        method="post">
                    <div @class(['flex flex-col gap-4 mb-4'])>
                        <x-form.input id="sign-in-email-field"
                                      name="email"
                                      type="email"
                                      value="{{ old('email') }}"
                                      autocomplete="username"
                                      required
                                      label="{{ 'Enter your email' }}"
                                      :isInvalid="$errors->has('email')" />
                        <x-form.input id="sign-in-password-field"
                                      name="password"
                                      type="password"
                                      required
                                      label="{{ 'Enter your password' }}"
                                      :isInvalid="$errors->has('email')" />
                        <div @class(['h-8'])>
                            <x-form.error type="email" />
                        </div>
                    </div>
                    <div @class(['flex justify-center'])>
                        <x-form.input id="sign-in-remember-me-checkbox"
                                      name="remember_me"
                                      type="checkbox"
                                      label="{{ 'Remember me' }}" />
                    </div>
                </x-form>
            </div>
            <div>
                <x-form.button form="sign-in-form"
                               type="submit"
                               text="{{ 'Sign in' }}" />
            </div>
            <div @class(['my-8 text-center'])>
                <x-nav.link href="{{ route('password.request') }}"
                            text="{{ 'Forgot your password?' }}" />
            </div>
            <div @class(['flex flex-col gap-2 items-center'])>
                <p>{{ "Don't have a " . config('app.name') . ' account?' }}</p>
                <x-nav.link href="{{ route('register') }}"
                            text="{{ 'Sign up' }}" />
            </div>
        </div>
    </div>
</x-app>
