<?php

$GLOBALS['entity'] = [];

/**
 * @var string SQL Query
 */
$qFetchListSql = <<<END
  SELECT
    *
  FROM
    public."Entity"
  END;

pg_prepare(
  $GLOBALS['dbh'], 
  "select_all_entity", 
  $qFetchListSql
);

/**
 * Fetch Entity List
 * 
 * @return Entity[] Entity List
 */
function fetchEntityList () {

  if (count($GLOBALS['entity']) > 0) {
    return $GLOBALS['entity'];
  }

  $dbconn = $GLOBALS['dbh'];

  $result = pg_execute(
    $dbconn, 
    "select_all_entity", 
    array()
  );

  $result = array_map(function ($cat) {

    if (is_null($cat['ParentID'])) {
      return new Entity(
        $cat['ID'],
        $cat['Name'],
        $cat['Path']
      );
    }

    return new Entity(
      $cat['ID'],
      $cat['Name'],
      $cat['Path'],
      $cat['ParentID']
    );

  }, pg_fetch_all($result));

  $GLOBALS['entity'] = $result;

  return $result;
}
