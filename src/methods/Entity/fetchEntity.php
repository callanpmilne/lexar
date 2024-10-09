<?php

/**
 * Entity List
 * 
 * Shows a list of Entities
 */

require_once('../src/class/DetailedEntity.php');

/**
 * Fetch Entity * 
 * @param string $ID Entity ID
 * @return Entity 
 */
function fetchEntity (
  string $ID
): Entity {

  $dbconn = $GLOBALS['dbh'];

  $result = pg_query_params(
    $GLOBALS['dbh'], 
    ' SELECT
        *
      FROM
        public."Entity" ENT
      WHERE
        ENT."ID" = $1
    ', 
    array(
      $ID,
    )
  );

  $result = array_map(function ($r) {
    return new Entity(
      $r['ID'],
      $r['RelativeID'],
      $r['SecondRelativeID'],
      $r['Name'],
      $r['Path'],
      $r['Content'],
      $r['Created'],
      isset($r['Deleted']) ? $r['Deleted'] : null,
      isset($r['ParentID']) ? $r['ParentID'] : null
    );
  }, [pg_fetch_assoc($result)]);

  return $result[0];
}