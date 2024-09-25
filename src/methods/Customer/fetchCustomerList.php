<?php

/**
 * Fetch Customer List
 * 
 * @return Customer[] Customer List
 */
function fetchCustomerList () {
  
  $sth = $dbh->prepare('SELECT * FROM `Customers`');
  
  $sth->execute();

  $result = array_map(function ($cust) {
    return new Customer(
      $cust['ID']
    );
  }, $sth->fetchAll(PDO::FETCH_ASSOC));

  return $result;
}