# Product delete Flowchart

```mermaid
flowchart TB

uia --> | no | rtpp
rtpp --> due
uia --> | yes | rtpp2 --> dadd --> fs
fs --> | no | rtpp2
fs --> | yes | dapard --> dsm --> rtpp2

uia@{ shape: diamond, label: "User is admin?" }
fs@{ shape: diamond, label: "Form submitted?" }

rtpp@{ shape: rounded, label: "Redirect to previous page" }
rtpp2@{ shape: rounded, label: "Redirect to products page" }

dadd@{ shape: rounded, label: "Display all delete dialog" }
dapard@{ shape: rounded, label: "Delete all products and related data" }
dsm@{ shape: rounded, label: "Display success message" }
```

---

- [Return to documentation](../index.md)
