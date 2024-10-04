<?php

require_once('../src/class/Organisation.php');

/**
 * Create Organisation
 * 
 * @param Organisation $org
 */
function createOrganisation (
  Organisation $org
) {

  try {
    return insertOrganisation(
      $org->ID,
      $org->Name,
      $org->Added,
      $org->ParentID,
    );
  }
  catch (Exception $e) {
    return false;
  }

}

/**
 * Insert Organisation
 * 
 * @param string $name New Organisation Name
 * @param string $Name
 * @param int $Added
 * @param string|null $ParentID
 */
function insertOrganisation (
  string $ID,
  string $Name,
  int $Added = 0,
  string|null $ParentID = null
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn,
    "insert_new_organisation", 
    ' INSERT
      INTO 
        public."Organisations" (
          "ParentID",
          "ID",
          "Name",
          "Added"
        ) 
      VALUES 
        (
          $1,
          $2,
          $3,
          $4
        )'
  );

  $result = pg_execute(
    $dbconn,
    "insert_new_organisation", 
    array(
      $ParentID,
      $ID,
      $Name,
      $Added > 0 ? $Added : time()
    )
  );

  return pg_affected_rows($result) > 0;

}