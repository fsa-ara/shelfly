<div>
    <h1>
        Login
    </h1>
    <form action="{{ route('login.store') }}"
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
            @error('email')
                <p>
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div>
            <label>
                <input id="remember-me"
                       name="remember-me"
                       type="checkbox">
                Remember me
            </label>
        </div>
        <button type="submit">
            Sign in
        </button>
    </form>
    <div>
        <a href="{{ route('password.verify') }}">
            Forgot password?
        </a>
    </div>
    <div>
        <p>
            Don't have an account?
        </p>
        <a href="{{ route('register') }}">
            Create your account
        </a>
    </div>
</div>
