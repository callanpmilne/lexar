<?php

require_once('../src/class/User.php');

/**
 * Fetch User By Username
 * 
 * @param string $username User's username
 * @return User
 */
function fetchUserByUsername (
  string $username
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_one_user_by_username", 
    ' SELECT * 
      FROM public."Users" 
      WHERE lower("Username") = lower($1)'
  );

  $result = pg_execute(
    $dbconn, 
    "select_one_user_by_username", 
    array(
      $username,
    )
  );

  if (pg_num_rows($result) < 1) {
    throw new Exception('No such user');
  }

  $result = filterUserResult($result);

  return $result[0];
}


/**
 * Fetch User By ID
 * 
 * @param string $id User's ID
 * @return User
 */
function fetchUserByID (
  string $id
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_one_user_by_user_id", 
    ' SELECT * 
      FROM public."Users" 
      WHERE "ID" = $1'
  );

  $result = pg_execute(
    $dbconn, 
    "select_one_user_by_user_id", 
    array(
      $id,
    )
  );

  $result = filterUserResult($result);

  return $result[0];
}

function filterUserResult(
  $result
): array {
  return array_map(function ($user) {
    return new User(
      $user['ID'],
      $user['Username'],
      $user['Name'],
      $user['IsSuperAdmin'],
    );
  }, [pg_fetch_assoc($result)]);
}