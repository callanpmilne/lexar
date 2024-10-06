<?php

require_once('../src/class/DetailedCustomer.php');

/**
 * Fetch Customer List
 * 
 * @return DetailedCustomer[] Customer List
 */
function fetchCustomerList () {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn,
    "select_all_customers", 
    ' SELECT 
        CUST."ID" AS "CustomerID",
        CUST."Name" AS "CustomerName",
        AC."ID" AS "AccountID",
        AC."Name" AS "AccountName",
        AC."Opened" AS "AccountOpened",
        AC."Closed" AS "AccountClosed",
        SUM(PA."Amount") AS "TotalPaymentsAmount",
        SUM(PA."FeeAmount") AS "TotalFeesAmount",
        MAX(PA."Received") AS "LastPaymentTimestamp"
      
      FROM /* Customers Table */
        public."Customers" CUST

      LEFT JOIN /* Links us to CustomerAccounts table */
        public."CustomerAccounts" CA
          ON CUST."ID" = CA."CustomerID"

      LEFT JOIN /* Which we may use to get accounts for the customer */
        public."Accounts" AC
          ON AC."ID" = CA."AccountID"

      LEFT JOIN /* Which we may use to get info about payments for the account */
        public."AccountPayments" AP
          ON AP."AccountID" = AC."ID"
        
      LEFT JOIN /* Which we may use to get the sum of all payment, and fee amounts */
        public."Payments" PA
          ON PA."ID" = AP."PaymentID"

      GROUP BY CUST."ID", AC."ID"
    '
  );

  $result = pg_execute(
    $dbconn, 
    "select_all_customers", 
    array()
  );

  $result = array_map(function ($cust) {
    return new DetailedCustomer(
      $cust['CustomerID'],
      $cust['CustomerName'],
      $cust['AccountID'] ? $cust['AccountID'] : '',
      $cust['AccountName'] ? $cust['AccountName'] : '',
      $cust['AccountOpened'] ? $cust['AccountOpened'] : 0,
      $cust['TotalPaymentsAmount'] ? $cust['TotalPaymentsAmount'] : 0,
      $cust['TotalFeesAmount'] ? $cust['TotalFeesAmount'] : 0,
      $cust['AccountClosed'] ? $cust['AccountClosed'] : null,
      $cust['LastPaymentTimestamp'] ? $cust['LastPaymentTimestamp'] : null,
    );
  }, pg_fetch_all($result, PGSQL_ASSOC));

  return $result;
}