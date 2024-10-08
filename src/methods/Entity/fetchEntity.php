<?php

/**
 * Entity List
 * 
 * Shows a list of Entities
 */

require_once('../src/class/Entity.php');

$GLOBALS['entity'] = [];

/**
 * @var string SQL Query
 */
$qFetchListSql = <<<END
  SELECT 
    *
  FROM
    public."Entity"
  WHERE
    "ID" = $1
  END;

// Register the SQL Query
pg_prepare(
  $GLOBALS['dbh'],
  "select_one_entity_by_id", 
  $qFetchListSql
);

/**
 * Fetch Entity * 
 * @param string $ID Entity ID
 * @return Entity 
 */
function fetchEntity (
  string $ID
) {

  $dbconn = $GLOBALS['dbh'];

  $result = pg_execute(
    $dbconn, 
    "select_one_entity_by_id", 
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
      isset($r['ParentID']) ? $r['ParentID'] : = null
    );
  }, [pg_fetch_assoc($result)]);

  return $result[0];
}