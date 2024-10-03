<?php

require_once('../src/class/Session.php');

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

  pg_prepare(
    $dbconn, 
    "", 
    ' SELECT * 
      FROM public."Sessions" 
      WHERE "ID" = $1'
  );

  $result = pg_execute(
    $dbconn, 
    "", 
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