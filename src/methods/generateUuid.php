<?php

/**
 * Generate UUID
 * 
 * @return string A new UUID
 */
function generateUuid () {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "generate_uuid", 
    'SELECT gen_random_uuid()'
  );

  $result = pg_execute(
    $dbconn, 
    "generate_uuid", 
    array()
  );

  return pg_fetch_row($result)[0];
}
