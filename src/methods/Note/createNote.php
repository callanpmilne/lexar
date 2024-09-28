<?php

require_once('../src/class/Customer.php');

/**
 * Create Note
 * 
 * @param Note $n
 */
function createNote (
  Note $n
) {

  try {
    return insertNote(
      $n->ID,
      $n->Author,
      $n->ContentBody,
      $n->Created
    );
  }
  catch (Exception $e) {
    return false;
  }

}

/**
 * Insert Note
 * 
 * @param string $ID Note UUID
 * @param string $Author UUID of the Authoring User
 * @param string $ContentBody Text Content of the Note
 * @param int $Created Note Created Timestamp
 */
function insertNote (
  string $ID,
  string $Author,
  string $ContentBody,
  int $Created
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn,
    "insert_new_note", 
    ' INSERT
      INTO 
        public."Notes" (
          "ID",
          "Author",
          "ContentBody",
          "Created"
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
    "insert_new_note", 
    array(
      $ID,
      $Author,
      $ContentBody,
      $Created,
    )
  );

  return pg_affected_rows($result) > 0;

}