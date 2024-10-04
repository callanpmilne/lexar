<?php

require_once('../src/class/OrganisationNote.php');

/**
 * Fetch Organisation Notes
 * 
 * @param string $OrganisationID Organisation ID
 * @return OrganisationNote[] Organisation Note List
 */
function fetchOrganisationNotes (
  string $OrganisationID
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_all_organisation_notes", 
    ' SELECT 
        CN."ID" AS "OrganisationNoteID",
        CN."OrganisationID", CN."Recorded",
        N."ID" AS "NoteID", N."Author",
        N."ContentBody", N."Created"
      FROM public."OrganisationNotes" AS CN
      LEFT JOIN public."Notes" AS N
        ON CN."NoteID" = N."ID"
      WHERE CN."OrganisationID" = $1
      ORDER BY CN."Recorded" DESC'
  );

  $result = pg_execute(
    $dbconn,
    "select_all_organisation_notes", 
    array(
      $OrganisationID
    )
  );

  $result = array_map(function ($note) {
    return new OrganisationNote(
      $note['OrganisationNoteID'],
      $note['OrganisationID'],
      $note['Recorded'],
      $note['NoteID'],
      $note['Author'],
      $note['ContentBody'],
      $note['Created']
    );
  }, pg_fetch_all($result));

  return $result;
}