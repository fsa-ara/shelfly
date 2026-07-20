# Email verification

## Description

Ensures that users own the email address associated with their account before accessing protected features.

## Workflow

- Register a new user account
- Send an email verification link
- Redirect the user to the email verification notice page
- Open the verification link from the email
- Validate the signed verification URL
- Mark the email address as verified
- Allow access to email-protected features

## Security

- Verification links are signed to prevent tampering
- Verification links expire after a limited time
- Verification emails can be resent with rate limiting
- Email verification is required before accessing protected routes

## Routes

- GET /account/email/verify
- GET /account/email/verify/{id}/{hash}
- POST /account/email/verify/notification

---

[Documentations](../index.md)
