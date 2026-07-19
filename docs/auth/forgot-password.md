# Forgot password

## Description

Allows users to securely reset their password by sending a time-limited reset link to their registered email address.

## Workflow

- Validate the email request
- Generate a password reset token
- Send the reset link by email
- Open the password reset page from the email link
- Validate the new password request
- Verify the reset token
- Update the user's password
- Generate a new remember token
- Dispatch the `PasswordReset` event
- Redirect the user to the login page

## Security

- Password reset links are time-limited
- Password reset requests are rate-limited
- Passwords are hashed before being stored
- The reset token is invalidated after a successful password reset
- The remember token is regenerated after a successful password reset

## Routes

- GET /account/password/verify
- POST /account/password/verify
- GET /account/password/reset/{token}
- POST /account/password/reset

---

[Documentations](../index.md)
