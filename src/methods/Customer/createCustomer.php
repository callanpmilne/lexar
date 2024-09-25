<?php

/**
 * Create Customer
 * 
 * @param Customer $cust
 */
function createCustomer (
  Customer $cust
) {

  try {
    insertCustomer($cust->Name);
    return true;
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
  string $name
) {

  $sth = $dbh->prepare('INSERT
    INTO 
      `Customers` (
        `Name`
      ) 
    VALUES 
      (
        ?
      )');
  
  $sth->bindParam(1, $name, PDO::PARAM_STR, 256);

  $sth->execute();

}