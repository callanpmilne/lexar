<?php

/**
 * Fetch Category
 * 
 * @param string $ID Category ID
 * @return Category
 */
function fetchCategory (
  string $ID
) {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_one_category_by_id", 
    'SELECT * FROM public."Categories" WHERE "ID" = $1'
  );

  $result = pg_execute(
    $dbconn, 
    "select_one_category_by_id", 
    array(
      $ID,
    )
  );

  $result = array_map(function ($cat) {
    return new Category(
      $cat['ID'],
      $cat['Name'],
      $cat['Path'],
      $cat['ParentID']
    );
  }, [pg_fetch_assoc($result)]);

  return $result[0];
}