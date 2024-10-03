<?php

/**
 * Fetch Customer
 * 
 * @param string $ID Customer ID
 * @return Customer
 */
function fetchCustomer (
  string $ID
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_one_customer_by_id", 
    'SELECT * FROM public."Customers" WHERE "ID" = $1'
  );

  $result = pg_execute(
    $dbconn, 
    "select_one_customer_by_id", 
    array(
      $ID,
    )
  );

  $result = array_map(function ($cust) {
    return new Customer(
      $cust['ID'],
      $cust['Name']
    );
  }, [pg_fetch_assoc($result)]);

  return $result[0];
}