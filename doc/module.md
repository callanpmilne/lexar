# Lexar Modules

## Files

**`src/class/`**
* `Customer.php` : Customer Class
* `DetailedCustomer.php` : Detailed Customer Class

**`src/common/form/`**
* `create/customer.php` : *Create Customer* Form

**`src/methods/Customer/`**
* `createCustomer.php` : Persist *One Customer* to DB
* `fetchCustomer.php` : Fetch *One Customer* from DB
* `fetchCustomerList.php` : Fetch *Customer List* from DB

**`src/pages/admin/`**
* `create/customer.php` : *Create Customer* Admin Page
* `list/customers.php` : *Customer List* Admin Page
* `view/customer.php` : *View Customer* Admin Page

### Directory Structure

```
src/
  class/
    Customer.php
    DetailedCustomer.php
  common/
    form/
      create/
        customer.php
  methods/
    Customer/
      createCustomer.php
      fetchCustomer.php
      fetchCustomerList.php
  pages/
    admin/
      create/
        customer.php
      list/
        customers.php
      view/
        customer.php
```