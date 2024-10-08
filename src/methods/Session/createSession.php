<?php

require_once('../src/class/Session.php');

/**
 * @var string SQL Query
 */
$qInsertSessionSql = <<<END
  INSERT INTO 
    public."Sessions" (
      "ID",
      "SecretKey",
      "Started"
    ) 
  VALUES 
    (
      $1,
      $2,
      $3
    )
  END;

// Register the SQL Query
pg_prepare(
  $GLOBALS['dbh'],
  "create_session", 
  $qInsertSessionSql
);

/**
 * Create Session
 * 
 * @param Session $session
 */
function createSession (
  Session $session
) {

  try {
    return insertSession(
      $session->ID,
      $session->SecretKey,
      $session->Started
    );
  }
  catch (Exception $e) {
    return false;
  }

}

/**
 * Insert Session
 * 
 * @param string $ID Session UUID
 * @param string $SecretKey Session Secret Key
 * @param int $Started Session Started Timestamp
 */
function insertSession (
  string $ID,
  string $SecretKey,
  int $Started
) {

  $dbconn = $GLOBALS['dbh'];

  $result = pg_execute(
    $dbconn,
    "create_session", 
    array(
      $ID,
      $SecretKey,
      $Started,
    )
  );

  return pg_affected_rows($result) > 0;

}