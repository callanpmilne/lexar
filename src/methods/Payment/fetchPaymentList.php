<?php

require_once('../src/class/Payment.php');

/**
 * Fetch Payment List
 * 
 * @return Payment[] Payment List
 */
function fetchPaymentList () {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_all_payments", 
    ' SELECT P.* 
      FROM public."Payments" P
      ORDER BY P."Received" DESC'
  );

  $result = pg_execute(
    $dbconn, 
    "select_all_payments", 
    array()
  );

  $result = array_map(function ($pmnt) {
    return new Payment(
      $pmnt['ID'],
      $pmnt['Amount'],
      $pmnt['CurrencyID'],
      $pmnt['FeeAmount'],
      $pmnt['FeeCurrencyID'],
      $pmnt['PaymentProcessorID'],
      $pmnt['Received'],
    );
  }, pg_fetch_all($result));

  return $result;
}