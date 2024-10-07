<?php

/**
 * Customer List
 * 
 * Prints a JSON list of Customers
 */

require_once('../src/class/DetailedCustomer.php');
require_once('../src/methods/Customer/fetchCustomerList.php');

// Ensure user is a super admin (checks via cookie)
if (!isSuperAdmin()) {
  http_response_code(200);
  print '{}';
  exit(0);
}

$query = array_key_exists('q', $_GET) ? $_GET['q'] : '';

$customers = fetchCustomerList();

if ($query && count($customers) > 0) {
  $customers = array_filter($customers, function ($customer) use ($query) {
    return $customer->matches($query);
  });
}

$customers = numericalArray($customers);

print json_encode($customers, JSON_THROW_ON_ERROR | JSON_OBJECT_AS_ARRAY, 3);

exit(0);
