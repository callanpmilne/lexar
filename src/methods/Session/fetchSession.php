<?php

require_once('../src/class/Session.php');

/**
 * @var string SQL Query
 */
$qUpdateSessionSql = <<<END
  SELECT 
    * 
  FROM 
    public."Sessions" 
  WHERE 
    "ID" = $1
  END;

// Register the SQL Query
pg_prepare(
  $GLOBALS['dbh'],
  "fetch_session_by_id", 
  $qUpdateSessionSql
);

/**
 * Fetch Session By ID
 * 
 * @param string $id Session ID
 * @return User
 */
function fetchSessionByID (
  string $id
): Session {

  $dbconn = $GLOBALS['dbh'];

  $result = pg_execute(
    $dbconn, 
    "fetch_session_by_id", 
    array(
      $id,
    )
  );

  $result = filterSessionResult($result);

  return $result[0];
}

function filterSessionResult(
  $result
): array {
  return array_map(function ($session): Session {
    return new Session(
      $session["ID"],
      $session["SecretKey"],
      $session["Started"],
      is_null($session["UserID"]) ? null : $session["UserID"],
      is_null($session["Expiry"]) ? null : $session["Expiry"],
    );
  }, [pg_fetch_assoc($result)]);
}