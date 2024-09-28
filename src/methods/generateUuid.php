<?php

/**
 * Generate UUID
 * 
 * @return string A new UUID
 */
function generateUuid () {

  $dbconn = $GLOBALS['dbh'];

  try {
    pg_prepare(
      $dbconn, 
      "", 
      'SELECT gen_random_uuid()'
    );
  }
  catch (Exception $e) {
    // do nothing
  }

  $result = pg_execute(
    $dbconn,
    "", 
    array()
  );

  return pg_fetch_row($result)[0];
}
