<?php

/**
 * Generate UUID
 * 
 * @return string A new UUID
 */
function generateUuid () {
  try {
    $result = pg_query_params(
      $GLOBALS['dbh'], 
      'SELECT gen_random_uuid()', 
      array()
    );

    return pg_fetch_row($result)[0];
  }
  catch (Exception $e) {
    
  }
}
