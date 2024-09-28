<?php

require_once('../src/class/CustomerNote.php');

/**
 * Fetch Customer Notes
 * 
 * @param string $CustomerID Customer ID
 * @return CustomerNote[] Customer Note List
 */
function fetchCustomerNotes (
  string $CustomerID
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_all_customer_notes", 
    ' SELECT 
        CN."ID" AS "CustomerNoteID",
        CN."CustomerID", CN."Recorded",
        N."ID" AS "NoteID", N."Author",
        N."ContentBody", N."Created"
      FROM public."CustomerNotes" AS CN
      LEFT JOIN public."Notes" AS N
        ON CN."NoteID" = N."ID"
      WHERE CN."CustomerID" = $1
      ORDER BY CN."Recorded" DESC'
  );

  $result = pg_execute(
    $dbconn,
    "select_all_customer_notes", 
    array(
      $CustomerID
    )
  );

  $result = array_map(function ($note) {
    return new CustomerNote(
      $note['CustomerNoteID'],
      $note['CustomerID'],
      $note['Recorded'],
      $note['NoteID'],
      $note['Author'],
      $note['ContentBody'],
      $note['Created']
    );
  }, pg_fetch_all($result));

  return $result;
}