<?php

require_once('../src/class/CustomerPayment.php');
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
        CP."ID" AS "CustomerPaymentID",
        CP."CustomerID", CP."Recorded",
        CP."Description", P."ID" AS "PaymentID", 
        P."Amount", P."CurrencyID",
        P."FeeAmount", P."FeeCurrencyID",
        P."PaymentProcessorID", P."Received"
      FROM public."CustomerPayments" AS CP
      LEFT JOIN public."Payments" AS P
        ON CP."PaymentID" = P."ID"
      WHERE CP."CustomerID" = $1
      ORDER BY CP."Recorded" DESC'
  );

  $result = pg_execute(
    $dbconn,
    "select_all_customer_payments", 
    array(
      $CustomerID
    )
  );

  $result = array_map(function ($pmnt) {
    return new CustomerPayment(
      $pmnt['CustomerPaymentID'],
      $pmnt['CustomerID'],
      $pmnt['Description'],
      $pmnt['Recorded'],
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
