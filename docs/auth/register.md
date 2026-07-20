# Register

## Description

Creates a new user account.

## Workflow

- Validate the email and password request
- Create the user
- Dispatch the `Registered` event
- Authenticate the user
- Regenerate the session
- Redirect to the email verification page

## Security

- Create user using `DB::transaction()`
- Password hashed using `Hash::make()`
- Regenerate the session ID to prevent session fixation

## Routes

- GET /account/sign-up
- POST /account/sign-up

---

[Documentations](../index.md)
