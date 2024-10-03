<?php

require_once('../src/class/Customer.php');

/**
 * Create Customer
 * 
 * @param Customer $cust
 */
function createCustomer (
  Customer $cust
) {

  try {
    return insertCustomer(
      $cust->ID,
      $cust->Name
    );
  }
  catch (Exception $e) {
    return false;
  }

}

/**
 * Insert Customer
 * 
 * @param string $name New Customer Name
 */
function insertCustomer (
  string $ID,
  string $Name
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn,
    "insert_new_customer", 
    ' INSERT
      INTO 
        public."Customers" (
          "ID",
          "Name"
        ) 
      VALUES 
        (
          $1,
          $2
        )'
  );

  $result = pg_execute(
    $dbconn,
    "insert_new_customer", 
    array(
      $ID,
      $Name
    )
  );

  return pg_affected_rows($result) > 0;

}