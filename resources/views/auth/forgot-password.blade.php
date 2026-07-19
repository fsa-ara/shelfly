<div>
    <h1>
        Forgot password
    </h1>
    <form action="{{ route('password.email') }}"
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
            @error('email')
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
