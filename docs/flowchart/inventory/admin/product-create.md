# Product create Flowchart

```mermaid
flowchart TB

uia --> | no | rtpp --> due
uia --> | yes | rtapp --> fs
fs --> | no | earfp --> fs
fs --> | yes | cv
cv --> | no | dve --> earfp
cv --> | yes | rtpp2 --> cps

uia@{ shape: diamond, label: "User is admin?" }
fs@{ shape: diamond, label: "Form submitted?" }
cv@{ shape: diamond, label: "Credentials validated?" }

rtpp@{ shape: rounded, label: "Redirect to previous page" }
rtapp@{ shape: rounded, label: "Redirect to add product page" }
rtpp2@{ shape: rounded, label: "Redirect to products page" }
earfp@{ shape: rounded, label: "Enter all required fields product" }
due@{ shape: rounded, label: "Display unauthorize error" }
dve@{ shape: rounded, label: "Display validation error" }
cps@{ shape: rounded, label: "Create product successful" }
```

---

- [Return to documentation](../index.md)
