<?php

/**
 * @var string SQL Query
 */
$qUpdateSessionSql = <<<END
  UPDATE
    public."Sessions"
  SET
    "UserID" = $1 , 
    "Expiry" = $2
  WHERE
    "ID" = $3
  END;

// Register the SQL Query
pg_prepare(
  $GLOBALS['dbh'],
  "update_session_user_id_and_expiry", 
  $qUpdateSessionSql
);

/**
 * Update Session Set User ID
 * 
 * @param string $SessionID
 * @param string $UserID
 * @param int $Duration Number of seconds until the session expires
 */
function updateSessionSetUserID (
  string $SessionID,
  string $UserID,
  int $Duration = 900
) {

  try {
    $dbconn = $GLOBALS['dbh'];
  
    $result = pg_execute(
      $dbconn,
      "update_session_user_id_and_expiry", 
      array(
        $UserID,
        $Duration,
        $SessionID,
      )
    );
  
    return pg_affected_rows($result) > 0;
  }
  catch (Exception $e) {
    return false;
  }

}