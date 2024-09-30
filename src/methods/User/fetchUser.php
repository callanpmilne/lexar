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

  $result = array_map(function ($user) {
    return new User(
      $user['ID'],
      $user['Username'],
      $user['Name'],
      $user['IsSuperAdmin'],
    );
  }, [pg_fetch_assoc($result)]);

  return $result[0];
}