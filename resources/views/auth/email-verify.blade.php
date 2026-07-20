<div>
    <h1>
        Email verify
    </h1>
    <div>
        <p>
            We have sent you a verification email.
        </p>
        <p>
            Please click the link to activate your account.
        </p>
    </div>
    <form action="{{ route('verification.send') }}"
          method="post">
        @csrf
        <button type="submit">
            Resend
        </button>
    </form>
</div>
