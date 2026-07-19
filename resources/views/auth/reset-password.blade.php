<div>
    <h1>
        Reset password
    </h1>
    <form action="{{ route('password.update') }}"
          method="post">
        @csrf
        <input name="token"
               type="hidden"
               value="{{ request('token') }}"
               required>
        <input name="email"
               type="hidden"
               value="{{ request('email') }}"
               required>
        <div>
            <div>
                <input id="password"
                       name="password"
                       type="password"
                       placeholder=" "
                       required>
                <label for="password">
                    Password
                </label>
            </div>
            <div>
                <input id="confirm-password"
                       name="password_confirmation"
                       type="password"
                       placeholder=" "
                       required>
                <label for="confirm-password">
                    Confirm password
                </label>
            </div>
            @error('password')
                <p>
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit">
            Send
        </button>
    </form>
</div>
