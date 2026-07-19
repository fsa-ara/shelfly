# Login

## Description

Authenticates a user and starts a new authenticated session.

## Workflow

- Validate the email and password request
- Authenticate the user, saving or not remember token
- Regenerate the session
- Redirect the user to the dashboard page

## Security

- Authenticate the user using `Auth::attempt()`
- Regenerate the session ID to prevent session fixation
- Return an error if the provided credentials are invalid

## Routes

- GET /account/sign-in
- POST /account/sign-in

---

[Documentations](../index.md)
