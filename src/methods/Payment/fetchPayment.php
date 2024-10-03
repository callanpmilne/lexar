<?php

/**
 * Fetch Payment
 * 
 * @param string $ID Payment ID
 * @return Payment
 */
function fetchPayment (
  string $ID
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_one_payment_by_id", 
    'SELECT * FROM public."Payments" WHERE "ID" = $1'
  );

  $result = pg_execute(
    $dbconn, 
    "select_one_payment_by_id", 
    array(
      $ID,
    )
  );

  $result = array_map(function ($pmnt) {
    return new Payment(
      $pmnt['ID'],
      $pmnt['Amount'],
      $pmnt['CurrencyID'],
      $pmnt['FeeAmount'],
      $pmnt['FeeCurrencyID'],
      $pmnt['PaymentProcessorID'],
      $pmnt['Received']
    );
  }, [pg_fetch_assoc($result)]);

  return $result[0];
}