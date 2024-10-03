<?php

require_once('../src/class/CustomerInteraction.php');

/**
 * Fetch Customer Interactions
 * 
 * @param string $CustomerID Customer ID
 * @return CustomerInteraction[] Customer Interaction List
 */
function fetchCustomerInteractions (
  string $CustomerID
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_all_customer_interactions", 
    ' SELECT 
        CI."ID" AS "CustomerInteractionID",
        CI."CustomerID", CI."StartTime",
        CI."EndTime", CI."MediumID",
        N."ID" AS "NoteID", N."Author",
        N."ContentBody", N."Created"
      FROM public."CustomerInteractions" AS CI
      LEFT JOIN public."Notes" AS N
        ON CI."NoteID" = N."ID"
      WHERE CI."CustomerID" = $1'
  );

  $result = pg_execute(
    $dbconn,
    "select_all_customer_interactions", 
    array(
      $CustomerID
    )
  );

  $result = array_map(function ($ci) {
    return new CustomerInteraction(
      $ci['CustomerInteractionID'],
      $ci['CustomerID'],
      $ci['StartTime'],
      $ci['EndTime'],
      $ci['MediumID'],
      $ci['NoteID'],
      $ci['Author'],
      $ci['ContentBody'],
      $ci['Created']
    );
  }, pg_fetch_all($result));

  return $result;
}