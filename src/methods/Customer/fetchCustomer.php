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
  
  $sth = $dbh->prepare('SELECT * 
    FROM `Customers`
    WHERE `ID` = ?');
  
  $sth->bindParam(1, $ID, PDO::PARAM_STR, 256);
  
  $sth->execute();

  $result = array_map(function ($cust) {
    return new Customer(
      $cust['ID']
    );
  }, $sth->fetch(PDO::FETCH_ASSOC));

  return $result[0];
}