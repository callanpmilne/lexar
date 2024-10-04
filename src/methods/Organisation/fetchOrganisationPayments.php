<?php

require_once('../src/class/AccountPayment.php');
require_once('../src/constants/currency.php');
require_once('../src/constants/payment.php');

/**
 * Fetch Organisation Payments
 * 
 * @param string $OrganisationID Organisation ID
 * @return OrganisationPayment[] Organisation Payment List
 */
function fetchOrganisationPayments (
  string $OrganisationID
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_all_organisation_payments", 
    ' SELECT 
        AP."ID" AS "AccountPaymentID",
        CA."OrganisationID", AP."Description", 
        P."ID" AS "PaymentID", AP."Received",
        P."Amount", P."CurrencyID",
        P."FeeAmount", P."FeeCurrencyID",
        P."PaymentProcessorID"
      FROM public."OrganisationAccounts" AS CA
      LEFT JOIN public."Accounts" AS A
        ON CA."AccountID" = A."ID"
      LEFT JOIN public."AccountPayments" AS AP
        ON A."ID" = AP."AccountID"
      LEFT JOIN public."Payments" AS P
        ON AP."PaymentID" = P."ID"
      WHERE CA."OrganisationID" = $1
      ORDER BY AP."Received" DESC'
  );

  $result = pg_execute(
    $dbconn,
    "select_all_organisation_payments", 
    array(
      $OrganisationID
    )
  );

  $result = array_map(function ($pmnt) {
    return new AccountPayment(
      $pmnt['AccountPaymentID'],
      $pmnt['OrganisationID'],
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
