<x-app title="Sign up">
    <h1>Sign up</h1>
    <p>{{ 'Sign up your ' . config('app.name') . ' account to access all services.' }}</p>
    <form id="sign-up-form"
          action="{{ route('register.store') }}"
          method="post">
        <div>
            <div>
                <label for="sign-up-email-field">Enter your email</label>
                <input id="sign-up-email-field"
                       name="email"
                       type="email"
                       value="{{ old('email') }}"
                       aria-required="true"
                       autocomplete="email"
                       required>
            </div>
            <div>
                <label for="sign-up-password-field">Enter your password</label>
                <input id="sign-up-password-field"
                       name="password"
                       type="password"
                       aria-required="true"
                       required>
            </div>
            <div>
                <label for="sign-up-password-confirmation-field">Confirm your password</label>
                <input id="sign-up-password-confirmation-field"
                       name="password_confirmation"
                       type="password"
                       aria-required="true"
                       required>
            </div>
            <div>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button form="sign-up-form"
                type="submit">Sign up</button>
    </form>
    <div>
        <p>{{ 'Do you already have a ' . config('app.name') . ' account?' }}</p>
        <a href="{{ route('login') }}">Sign in</a>
    </div>
</x-app>
