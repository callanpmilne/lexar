<?php

/**
 * Fetch Customer List
 * 
 * @return Customer[] Customer List
 */
function fetchCustomerList () {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_all_customers", 
    'SELECT * FROM public."Customers"'
  );

  $result = pg_execute(
    $dbconn, 
    "select_all_customers", 
    array()
  );

  $result = array_map(function ($cust) {
    return new Customer(
      $cust['ID'],
      $cust['Name']
    );
  }, pg_fetch_all($result));

  return $result;
}