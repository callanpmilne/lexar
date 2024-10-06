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
  exit(1);
}

$query = array_key_exists('q', $_GET) ? $_GET['q'] : '';

$customers = fetchCustomerList();

print json_encode($customers, JSON_THROW_ON_ERROR, 3);
