# Category update Flowchart

```mermaid
flowchart TB

uia --> | no | rtpp --> due
uia --> | yes | rtecp --> fs
fs --> | no | enc --> fs
fs --> | yes | cv
cv --> | no | dve --> enc
cv --> | yes | rtcp --> ucs

uia@{ shape: diamond, label: "User is admin?" }
fs@{ shape: diamond, label: "Form submitted?" }
cv@{ shape: diamond, label: "Credentials validated?" }

rtpp@{ shape: rounded, label: "Redirect to previous page" }
rtecp@{ shape: rounded, label: "Redirect to edit category page" }
rtcp@{ shape: rounded, label: "Redirect to categories page" }
enc@{ shape: rounded, label: "Enter name category" }
due@{ shape: rounded, label: "Display unauthorize error" }
dve@{ shape: rounded, label: "Display validation error" }
ucs@{ shape: rounded, label: "Update category successful" }
```

---

- [Return to documentation](../index.md)
