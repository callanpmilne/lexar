<?php

$GLOBALS['organisations'] = [];

require_once('../src/class/DetailedOrganisation.php');

/**
 * Fetch Organisation List
 * 
 * @return Organisation[] Organisation List
 */
function fetchOrganisationList (
  // no args
) {

  if (count($GLOBALS['organisations']) > 0) {
    return $GLOBALS['organisations'];
  }

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    'select_all_organisations', 
    ' SELECT 
        ORG."ID" AS "OrganisationID",
        ORG."Name" AS "OrganisationName",
        AC."ID" AS "AccountID",
        AC."Name" AS "AccountName",
        AC."Opened" AS "AccountOpened",
        AC."Closed" AS "AccountClosed",
        SUM(PA."Amount") AS "TotalPaymentsAmount",
        SUM(PA."FeeAmount") AS "TotalFeesAmount",
        MAX(PA."Received") AS "LastPaymentTimestamp"
      
      FROM /* Organisations Table */
        public."Organisations" ORG

      LEFT JOIN /* Links us to OrganisationAccounts table */
        public."OrganisationAccounts" CA
          ON ORG."ID" = CA."OrganisationID"

      LEFT JOIN /* Which we may use to get accounts for the organisation */
        public."Accounts" AC
          ON AC."ID" = CA."AccountID"

      LEFT JOIN /* Which we may use to get info about payments for the account */
        public."AccountPayments" AP
          ON AP."AccountID" = AC."ID"
        
      LEFT JOIN /* Which we may use to get the sum of all payment, and fee amounts */
        public."Payments" PA
          ON PA."ID" = AP."PaymentID"

      GROUP BY ORG."ID", AC."ID"
    '
  );

  
  try{
    $result = pg_execute(
      $dbconn, 
      'select_all_organisations', 
      []
    );

    $rows = pg_fetch_all($result);
  }
  catch (Exception $e) {
    var_dump($e);
  }

  $orgs = array_map(function ($org) {
    
    $Added = array_key_exists('Added', $org) && !is_null($org['Added']) 
      ? $org['Added'] : time();

    $ParentID = array_key_exists('ParentID', $org) && !is_null(value: $org['ParentID']) 
      ? $org['ParentID'] : null;

    $AccountID                 = $org['AccountID'] ?            $org['AccountID'] : '';
    $AccountName               = $org['AccountName'] ?          $org['AccountName'] : '';
    $AccountOpened             = $org['AccountOpened'] ?        $org['AccountOpened'] : 0;
    $TotalPaymentsAmount       = $org['TotalPaymentsAmount'] ?  $org['TotalPaymentsAmount'] : 0;
    $TotalFeesAmount           = $org['TotalFeesAmount'] ?      $org['TotalFeesAmount'] : 0;
    $AccountClosed             = $org['AccountClosed'] ?        $org['AccountClosed'] : null;
    $LastPaymentTimestamp      = $org['LastPaymentTimestamp'] ? $org['LastPaymentTimestamp'] : null;

    return new DetailedOrganisation(
      $org['OrganisationID'],
      $org['OrganisationName'],
      $Added,
      $ParentID,
      $AccountID,
      $AccountName,
      $AccountOpened,
      $TotalPaymentsAmount,
      $TotalFeesAmount,
      $AccountClosed,
      $LastPaymentTimestamp,
    );
  }, $rows);

  $GLOBALS['organisations'] = $orgs;

  return $orgs;
}
