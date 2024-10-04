<?php

require_once('../src/class/Organisation.php');

/**
 * Fetch Organisation
 * 
 * @param string $ID Organisation ID
 * @return Organisation
 */
function fetchOrganisation (
  string $ID
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_one_organisation_by_id", 
    ' SELECT
        * 
      FROM 
        public."Organisations" 
      WHERE 
        "ID" = $1
      '
  );

  $result = pg_execute(
    $dbconn, 
    "select_one_organisation_by_id", 
    array(
      $ID,
    )
  );

  $result = array_map(function ($org) {
    $parentID = array_key_exists('ParentID', $org) && !is_null($org['ParentID'])
      ? $org['ParentID'] : null;

    return new Organisation(
      $org['ID'],
      $org['Name'],
      $org['Added'],
      $parentID
    );
  }, [pg_fetch_assoc($result)]);

  return $result[0];
}