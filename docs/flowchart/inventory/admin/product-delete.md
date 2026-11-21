# Product delete Flowchart

```mermaid
flowchart TB

uia --> | no | rtpp --> due
uia --> | yes | rtepp --> ddd --> fs
fs --> | no | rtepp
fs --> | yes | dpard --> rtpp2 --> dsm

uia@{ shape: diamond, label: "User is admin?" }
fs@{ shape: diamond, label: "Form submitted?" }

rtpp@{ shape: rounded, label: "Redirect to previous page" }
rtepp@{ shape: rounded, label: "Redirect to edit product page" }
rtpp2@{ shape: rounded, label: "Redirect to products page" }

ddd@{ shape: rounded, label: "Display delete dialog" }
dpard@{ shape: rounded, label: "Delete product and related data" }
dsm@{ shape: rounded, label: "Display success message" }
```

---

- [Return to documentation](../index.md)
