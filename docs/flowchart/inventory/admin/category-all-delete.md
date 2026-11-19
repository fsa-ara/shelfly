# Category delete Flowchart

```mermaid
flowchart TB

uia --> | no | rtpp
rtpp --> due
uia --> | yes | rtcp --> dadd --> fs
fs --> | no | rtcp
fs --> | yes | dacard --> dsm --> rtcp

uia@{ shape: diamond, label: "User is admin?" }
fs@{ shape: diamond, label: "Form submitted?" }

rtpp@{ shape: rounded, label: "Redirect to previous page" }
rtcp@{ shape: rounded, label: "Redirect to categories page" }

dadd@{ shape: rounded, label: "Display all delete dialog" }
dacard@{ shape: rounded, label: "Delete all categories and related data" }
dsm@{ shape: rounded, label: "Display success message" }
```

---

- [Return to documentation](../index.md)
