<x-app title="Reset password">
    <h1>Reset password</h1>
    <p>Enter your new password below to complete the password reset.</p>
    <form id="reset-password-form"
          action="{{ route('password.update') }}"
          method="post">
        <input name="token"
               type="hidden"
               value="{{ request('token') }}"
               aria-required="true"
               required>
        <input name="email"
               type="hidden"
               value="{{ request('email') }}"
               aria-required="true"
               required>
        <div>
            <div>
                <label for="reset-password-password-field">Enter your new password</label>
                <input id="reset-password-password-field"
                       name="password"
                       type="password"
                       aria-required="true"
                       required>
            </div>
            <div>
                <label for="reset-password-password-confirmation-field">Confirm your new password</label>
                <input id="reset-password-password-confirmation-field"
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
        <button form="reset-password-form"
                type="submit">Update</button>
    </form>
    <div>
        @error('email')
            <a href="{{ route('password.request') }}">Request a new password reset link</a>
        @enderror
    </div>
</x-app>
