<?php

require_once('../src/class/DetailedNote.php');

/**
 * @var string SQL Query
 */
$qSelectAllNotesSQL = 'SELECT 
  N."ID" AS "NoteID",
  N."Author" AS "Author",
  SUBSTRING(N."ContentBody", 0, 25) AS "ContentBody",
  N."Created" AS "Created",
  
	 (CASE WHEN CUST."ID" IS NULL and O."ID" IS NOT NULL
			THEN (SELECT O."Name")
		  	ELSE (SELECT CUST."Name")
     END) AS "SubjectName",
  
	 (CASE WHEN CUST."ID" IS NULL 
			THEN (SELECT \'ORG\')
		  	ELSE (SELECT \'CUST\')
     END) AS "SubjectType",
  
	 (CASE WHEN CUST."ID" IS NULL 
			THEN (SELECT O."ID")
		  	ELSE (SELECT CUST."ID")
     END) AS "SubjectID",
  
  Author."Name" AS "AuthorName"

  FROM 
    public."Notes" N

  LEFT JOIN
    public."CustomerNotes" CN
      ON CN."NoteID" = N."ID"
  
  LEFT JOIN
    public."Customers" CUST
      ON CUST."ID" = CN."CustomerID"
  
  LEFT JOIN
    public."OrganisationNotes" ORN
      ON ORN."NoteID" = N."ID"
  
  LEFT JOIN
    public."Organisations" O
      ON O."ID" = ORN."OrganisationID"
  
  LEFT JOIN
    public."Users" Author
      ON Author."ID" = N."Author"

  ORDER BY
    N."Created" DESC
  ';

// Register the SQL Query
pg_prepare(
  $GLOBALS['dbh'],
  "select_all_notes", 
  $qSelectAllNotesSQL
);

/**
 * Fetch Note List
 * 
 * @return DetailedNote[] Note List
 */
function fetchNoteList () {

  $dbconn = $GLOBALS['dbh'];

  $result = pg_execute(
    $dbconn, 
    "select_all_notes", 
    array()
  );

  $result = array_map(function ($n) {
    return new DetailedNote(
      $n['NoteID'],
      $n['Author'],
      $n['ContentBody'],
      $n['Created'],
      $n['AuthorName'] ? $n['AuthorName'] : 'UNKNOWN',
      $n['SubjectName'] ? $n['SubjectName'] : 'UNKNOWN',
      $n['SubjectType'] ? $n['SubjectType'] : 'UNKNOWN',
      $n['SubjectID'] ? $n['SubjectID'] : 'UNKNOWN',
    );
  }, pg_fetch_all($result, PGSQL_ASSOC));

  return $result;
}