<?php

require_once('../src/class/UserHash.php');

/**
 * Fetch Last User Hash
 * 
 * Returns most recently created UserHash for a user+type.
 * 
 * @param string $UserID User ID
 * @param string $Type Hash Type
 * @return UserHash
 */
function fetchLastUserHash (
  string $UserID,
  string $Type
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_one_user_hash", 
    ' SELECT H.*, UH.*
      FROM public."UserHashes" UH
        LEFT JOIN public."Hashes" H
          ON UH."HashID" = H."ID"
      WHERE UH."UserID" = $1
        AND UH."Type" = $2
      ORDER BY UH."Created" DESC
      LIMIT 1'
  );

  $result = pg_execute(
    $dbconn, 
    "select_one_user_hash", 
    array(
      $UserID,
      $Type,
    )
  );

  $result = array_map(function ($hash) {
    return new UserHash(
      $hash['UserHashID'],
      $hash['UserID'],
      $hash['HashID'],
      $hash['HashValue'],
      $hash['Type'],
      $hash['Created'],
      $hash['LastModified']
    );
  }, [pg_fetch_assoc($result)]);

  return $result[0];
}