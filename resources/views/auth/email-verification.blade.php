<x-app title="Email verification">
    <h1>Email verification</h1>
    <p>{{ 'A verification email has been sent to your inbox. Please click the link to verify your ' . config('app.name') . ' account.' }}</p>
    <form id="email-verification-form"
          action="{{ route('verification.send') }}"
          method="post">
        <div>
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <button form="email-verification-form"
                type="submit">Send</button>
    </form>
</x-app>
