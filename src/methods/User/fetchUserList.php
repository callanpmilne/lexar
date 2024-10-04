<?php

/**
 * @var string SQL Query
 */
$qSelectAllContactMethodSql = <<<END
  SELECT 
    * 
  FROM 
    public."Users" U
  ORDER BY
    U."Name" ASC
  END;

// Register the SQL Query
pg_prepare(
  $GLOBALS['dbh'], 
  "select_all_users", 
  $qSelectAllContactMethodSql
);

/**
 * Fetch User List
 * 
 * @return User[] User List
 */
function fetchUserList (
  // no args
) {
  $dbconn = $GLOBALS['dbh'];

  $result = pg_execute(
    $dbconn, 
    "select_all_users", 
    array()
  );

  $result = array_map(function ($u) {
    return new User(
      $u['ID'],
      $u['Name'],
      $u['Username'],
      IsSuperAdmin: $u['IsSuperAdmin']
    );
  }, pg_fetch_all($result));

  return $result;
}
