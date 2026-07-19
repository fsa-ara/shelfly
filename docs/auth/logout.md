# Logout

## Description

Deletes the authenticated user's account and securely logs the user out.

## Workflow

- Log the user out
- Invalidate the current session
- Regenerate the CSRF token
- Redirect the user to the dashboard page

## Security

- Invalidate the current session after logout
- Regenerate the CSRF token

## Routes

- POST /account/logout

---

[Documentations](../index.md)
