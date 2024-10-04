# Lexar Routing





## TOP-LEVEL ROUTES

### Authentication
```
/login
/logout
```

### Categories
```
/browse
/categories
```

### User
Routing for these paths is handled by the **UserRouter**.
```
/change/
/update/
/my/
```

### Admin
```
/admin/
```


## User Router

The user router is located in `src/pages/user/router.php`.

```
/my/wishlist    
/my/profile     
/my/saved       
/my/payments    
/my/transactions
/my/orders      
/my/settings    
/my/files       
  
/change/password
/update/contact 
```

## Admin Router

The admin router is located in `src/pages/admin/router.php`.

**Path Prefix**
```
admin/
```

### Customer Management

```
/admin/create/customer 
/admin/list/customers  
/admin/view/customer
```

### Org Management
```
/admin/create/org 
/admin/list/orgs  
/admin/view/org
```

### Category Management
```
/admin/create/category 
/admin/list/categories  
/admin/view/category
```

### User Management
```
/admin/create/user 
/admin/list/users  
/admin/view/user
```

### Contact Management
```
/admin/create/contact  
/admin/list/contacts  
```

### Me
```
/admin/create/interaction  
/admin/list/interactions  
```

### Nap
```
/admin/create/metadata  
/admin/list/metadata  
```

### Time
```
/admin/create/note  
/admin/list/notes  
```

### Nap
```
/admin/create/payment
/admin/list/payments
/admin/view/payment
```

### Nap
```
/admin/create/type  
/admin/list/types  
```

### Nap
```
/admin/tools/password/generator  
/admin/tools/password/hasher  
/admin/tools/timestamp/converter  
/admin/tools/uuid/generator  
/admin/tools/code/writer  
```
