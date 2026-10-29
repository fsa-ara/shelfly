# Database

```mermaid
erDiagram

    USERS ||--|| PROFILES : has

    USERS {
        bigint id PK
        char(36) uuid UK
        varchar(255) email UK
        varchar(255) password
        varchar(100) remember_token
        timestamp email_verified_at
        timestamp created_at
        timestamp updated_at
    }

    PROFILES {
        bigint id PK
        bigint user_id FK, UK
        varchar(64) username
        varchar(16) locale
        timestamp created_at
        timestamp updated_at
    }
```
