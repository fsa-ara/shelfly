<x-app title="Sign in">
    <h1>Sign in</h1>
    <p>{{ 'Sign in to your ' . config('app.name') . ' account to access all services.' }}</p>
    <form id="sign-in-form"
          action="{{ route('login.authenticate') }}"
          method="post">
        <div>
            <div>
                <label for="sign-in-email-field">Enter your email</label>
                <input id="sign-in-email-field"
                       name="email"
                       type="email"
                       value="{{ old('email') }}"
                       aria-required="true"
                       autocomplete="username"
                       required>
            </div>
            <div>
                <label for="sign-in-password-field">Enter your password</label>
                <input id="sign-in-password-field"
                       name="password"
                       type="password"
                       aria-required="true"
                       required>
            </div>
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="sign-in-remember-me-checkbox">Remember me</label>
            <input id="sign-in-remember-me-checkbox"
                   name="remember_me"
                   type="checkbox">
        </div>
        <button form="sign-in-form"
                type="submit">Sign in</button>
    </form>
    <div>
        <a href="">Forgot your password?</a>
    </div>
    <div>
        <p>{{ "Don't have a " . config('app.name') . ' account?' }}</p>
        <a href="">Sign up</a>
    </div>
</x-app>
