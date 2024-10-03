<?php

/**
 * Update Session Set User ID
 * 
 * @param string $SessionID
 * @param string $UserID
 */
function updateSessionSetUserID (
  string $SessionID,
  string $UserID
) {

  try {
    $dbconn = $GLOBALS['dbh'];
  
    pg_prepare(
      $dbconn,
      "", 
      ' UPDATE 
          public."Sessions"
          SET "UserID" = $1
          WHERE "ID" = $2'
    );
  
    $result = pg_execute(
      $dbconn,
      "", 
      array(
        $UserID,
        $SessionID,
      )
    );
  
    return pg_affected_rows($result) > 0;
  }
  catch (Exception $e) {
    return false;
  }

}