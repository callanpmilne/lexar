<?php

require_once('../src/methods/Note/createNote.php');
require_once('../src/class/CustomerNote.php');

/**
 * Create Customer Note
 * 
 * Persist a new CustomerNote to the database.
 * 
 * @param CustomerNote $c
 */
function createCustomerNote (
  CustomerNote $c
) {

  try {
    createNote(new Note(
      $c->ID,
      $c->Author,
      $c->ContentBody,
      $c->Created
    ));

    return insertCustomerNote(
      $c->CustomerNoteID,
      $c->ID, // $NoteID
      $c->CustomerID,
      $c->Recorded
    );
  }
  catch (Exception $e) {
    return false;
  }

}

/**
 * Insert Customer Note
 * 
 * @param string $ID New Customer Note ID
 * @param string $NoteID ID of the Note
 * @param string $CustomerID ID of the Customer
 * @param int $Recorded Timestamp when Note was Attached
 */
function insertCustomerNote (
  string $ID,
  string $NoteID,
  string $CustomerID,
  int $Recorded
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn,
    "insert_new_customer_note", 
    ' INSERT
      INTO 
        public."CustomerNotes" (
          "ID",
          "NoteID",
          "CustomerID",
          "Recorded"
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
    "insert_new_customer_note", 
    array(
      $ID,
      $NoteID,
      $CustomerID,
      $Recorded
    )
  );

  return pg_affected_rows($result) > 0;

}