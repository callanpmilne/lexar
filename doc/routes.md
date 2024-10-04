# Lexar Routing

## Top-Level Router

The top-level router is located at `src/router.php`.

### Authentication
Routes required for authentication and session management are handled by the *Top-Level Router*.

* `/login`
* `/logout`

### Categories
The *Top-Level Router* routes requests for Category routes to `/src/pages/categories.php`.

* `/browse`
* `/categories`
* `/categories/**/*`

### User
Routing for these paths is handled by the [**UserRouter**](#user-router).  The top-level router enforces rules around user sessions.

* `/change/**/*`
* `/update/**/*`
* `/my/**/*`

### Admin
Routing for these paths is handled by the [**Admin Router**](#admin-router).

* `/admin/**/*`

## User Router

The user router is located in `src/pages/user/router.php`.

### `/my/*` Routes

Templates in the `src/pages/user/my` directory are used by the **User Router** when it services requests to `/my/*`

| Route | Handler |
|-------|------|
| `/my` | `/src/pages/user/my` |
| ___ `/wishlist`     | ___ `/wishlist.php` |
| ___ `/profile`      | ___ `/profile.php` |
| ___ `/saved`        | ___ `/saved.php` |
| ___ `/payments`     | ___ `/payments.php` |
| ___ `/transactions` | ___ `/transactions.php` |
| ___ `/orders`       | ___ `/orders.php` |
| ___ `/settings`     | ___ `/settings.php` |
| ___ `/files`        | ___ `/files.php` |

### Other User Router Routes

| Route | Handler |
|-------|------|
| `/change` | `/src/pages/user/change` |
| ___ `/password`     | ___ `/password.php` |
| `/update` | `/src/pages/user/update` |
| ___ `/contact`     | ___ `/contact.php` |

## Admin Router

The Admin Router is located at `src/pages/admin/router.php`.

**Path Prefix**
```
src/pages/admin/
```

### Admin Tools

| Route | Handler |
|-------|------|
| **`/admin/tools`** | **`/src/pages/admin/tools`** |
| ___ `/password/generator`   | ___ `/password/generator` |
| ___ `/password/hasher`      | ___ `/password/hasher`  |
| ___ `/timestamp/converter`  | ___ `/timestamp/converter`    |
| ___ `/uuid/generator`       | ___ `/uuid/generator`    |
| ___ `/code/writer`          | ___ `/code/writer`    |

### Customers

| Route | Handler  |
|-------|------|
| **`/admin`** | **`/src/pages/admin`** |
| ___ `/create/customer` | ___ `/create/customer.php` |
| ___ `/list/customers`  | ___ `/list/customers.php` |
| ___ `/view/customer`   | ___ `/view/profile.php` |

### Organisations
| Route | Handler |
|-------|------|
| **`/admin`** | **`/src/pages/admin`** |
| ___ `/create/org` | ___ `/create/org.php` |
| ___ `/list/orgs`  | ___ `/list/orgs.php` |
| ___ `/view/org`   | ___ `/view/org.php` |

### Categories
| Route | Handler |
|-------|------|
| **`/admin`** | **`/src/pages/admin`** |
| ___ `/create/category` | ___ `/create/category.php` |
| ___ `/list/categories`  | ___ `/list/categories.php` |
| ___ `/view/category`   | ___ `/view/category.php` |

### Users (Logins)
| Route | Handler |
|-------|------|
| **`/admin`** | **`/src/pages/admin`** |
| ___ `/create/user` | ___ `/create/user.php` |
| ___ `/list/users`  | ___ `/list/users.php` |
| ___ `/view/user`   | ___ `/view/user.php` |

### Contact Details
| Route | Handler |
|-------|------|
| **`/admin`** | **`/src/pages/admin`** |
| ___ `/create/contact` | ___ `/create/contact.php` |
| ___ `/list/contacts`  | ___ `/list/contacts.php` |

### Interactions
| Route | Handler |
|-------|------|
| **`/admin`** | **`/src/pages/admin`** |
| ___ `/create/interaction` | ___ `/create/interaction.php` |
| ___ `/list/interactions`  | ___ `/list/interactions.php` |

### Nap
| Route | Handler |
|-------|------|
| **`/admin`** | **`/src/pages/admin`** |
| ___ `/create/metadata` | ___ `/create/metadata.php` |
| ___ `/list/metadata`  | ___ `/list/metadata.php` |

### Note Routes
| Route | Handler |
|-------|------|
| **`/admin`** | **`/src/pages/admin`** |
| ___ `/create/note` | ___ `/create/note.php` |
| ___ `/list/notes`  | ___ `/list/notes.php` |
| ___ `/view/note`   | ___ `/view/note.php` |

### Payment Routes
| Route | Handler |
|-------|------|
| **`/admin`** | **`/src/pages/admin`** |
| ___ `/create/payment` | ___ `/create/payment.php` |
| ___ `/list/payments`  | ___ `/list/payments.php` |
| ___ `/view/payment`   | ___ `/view/payment.php` |

### (Content-)Type Routes
| Route | Handler |
|-------|------|
| **`/admin`** | **`/src/pages/admin`** |
| ___ `/create/type` | ___ `/create/type.php` |
| ___ `/list/types`  | ___ `/list/types.php` |
