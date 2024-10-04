<?php

require_once('../src/methods/Note/createNote.php');
require_once('../src/class/OrganisationNote.php');

/**
 * Create Organisation Note
 * 
 * Persist a new OrganisationNote to the database.
 * 
 * @param OrganisationNote $c
 */
function createOrganisationNote (
  OrganisationNote $c
) {

  try {
    createNote(new Note(
      $c->ID,
      $c->Author,
      $c->ContentBody,
      $c->Created
    ));

    return insertOrganisationNote(
      $c->OrganisationNoteID,
      $c->ID, // $NoteID
      $c->OrganisationID,
      $c->Recorded
    );
  }
  catch (Exception $e) {
    return false;
  }

}

/**
 * Insert Organisation Note
 * 
 * @param string $ID New Organisation Note ID
 * @param string $NoteID ID of the Note
 * @param string $OrganisationID ID of the Organisation
 * @param int $Recorded Timestamp when Note was Attached
 */
function insertOrganisationNote (
  string $ID,
  string $NoteID,
  string $OrganisationID,
  int $Recorded
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn,
    "insert_new_organisation_note", 
    ' INSERT
      INTO 
        public."OrganisationNotes" (
          "ID",
          "NoteID",
          "OrganisationID",
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
    "insert_new_organisation_note", 
    array(
      $ID,
      $NoteID,
      $OrganisationID,
      $Recorded
    )
  );

  return pg_affected_rows($result) > 0;

}