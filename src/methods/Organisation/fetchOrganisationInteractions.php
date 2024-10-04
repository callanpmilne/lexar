<?php

require_once('../src/class/OrganisationInteraction.php');

/**
 * Fetch Organisation Interactions
 * 
 * @param string $OrganisationID Organisation ID
 * @return OrganisationInteraction[] Organisation Interaction List
 */
function fetchOrganisationInteractions (
  string $OrganisationID
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_all_organisation_interactions", 
    ' SELECT 
        CI."ID" AS "OrganisationInteractionID",
        CI."OrganisationID", CI."StartTime",
        CI."EndTime", CI."MediumID",
        N."ID" AS "NoteID", N."Author",
        N."ContentBody", N."Created"
      FROM public."OrganisationInteractions" AS CI
      LEFT JOIN public."Notes" AS N
        ON CI."NoteID" = N."ID"
      WHERE CI."OrganisationID" = $1'
  );

  $result = pg_execute(
    $dbconn,
    "select_all_organisation_interactions", 
    array(
      $OrganisationID
    )
  );

  $result = array_map(function ($ci) {
    return new OrganisationInteraction(
      $ci['OrganisationInteractionID'],
      $ci['OrganisationID'],
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