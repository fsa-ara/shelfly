<x-app title="Forgot password">
    <h1>Forgot password</h1>
    <p>Enter your email address to receive password reset instructions.</p>
    <form id="forgot-password-form"
          action="{{ route('password.email') }}"
          method="post">
        <div>
            <div>
                <label for="forgot-password-email-field">Enter your email</label>
                <input id="forgot-password-email-field"
                       name="email"
                       type="email"
                       value="{{ old('email') }}"
                       aria-required="true"
                       autocomplete="username"
                       required>
            </div>
            <div>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button form="forgot-password-form"
                type="submit">Send</button>
    </form>
    <div>
        <a href="{{ route('login') }}">Back to sign in</a>
    </div>
</x-app>
