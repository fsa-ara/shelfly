<div>
    <h1>
        Register
    </h1>
    <form action="{{ route('register.store') }}"
          method="post">
        @csrf
        <div>
            <div>
                <input id="email"
                       name="email"
                       type="email"
                       value="{{ old('email') }}"
                       placeholder=" "
                       required>
                <label for="email">
                    Email
                </label>
            </div>
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
            @error('email')
                <p>
                    {{ $message }}
                </p>
            @enderror
            @error('password')
                <p>
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit">
            Sign up
        </button>
    </form>
    <div>
        <p>
            Already have an account?
        </p>
        <a href="{{ route('login') }}">
            Sign in
        </a>
    </div>
</div>
