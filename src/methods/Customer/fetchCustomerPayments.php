<?php

require_once('../src/class/AccountPayment.php');
require_once('../src/constants/currency.php');
require_once('../src/constants/payment.php');

/**
 * Fetch Customer Payments
 * 
 * @param string $CustomerID Customer ID
 * @return CustomerPayment[] Customer Payment List
 */
function fetchCustomerPayments (
  string $CustomerID
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_all_customer_payments", 
    ' SELECT 
        AP."ID" AS "AccountPaymentID",
        CA."CustomerID", AP."Description", 
        P."ID" AS "PaymentID", AP."Received",
        P."Amount", P."CurrencyID",
        P."FeeAmount", P."FeeCurrencyID",
        P."PaymentProcessorID"
      FROM public."CustomerAccounts" AS CA
      LEFT JOIN public."Accounts" AS A
        ON CA."AccountID" = A."ID"
      LEFT JOIN public."AccountPayments" AS AP
        ON A."ID" = AP."AccountID"
      LEFT JOIN public."Payments" AS P
        ON AP."PaymentID" = P."ID"
      WHERE CA."CustomerID" = $1
      ORDER BY AP."Received" DESC'
  );

  $result = pg_execute(
    $dbconn,
    "select_all_customer_payments", 
    array(
      $CustomerID
    )
  );

  $result = array_map(function ($pmnt) {
    return new AccountPayment(
      $pmnt['AccountPaymentID'],
      $pmnt['CustomerID'],
      $pmnt['Description'],
      $pmnt['PaymentID'],
      $pmnt['Amount'],
      $pmnt['CurrencyID'],
      $pmnt['FeeAmount'],
      $pmnt['FeeCurrencyID'],
      $pmnt['PaymentProcessorID'],
      $pmnt['Received']
    );
  }, pg_fetch_all($result));

  return $result;
}
