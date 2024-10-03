<?php

/**
 * Fetch Category List
 * 
 * @return Category[] Category List
 */
function fetchCategoryList () {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_all_categories", 
    'SELECT * FROM public."Categories"'
  );

  $result = pg_execute(
    $dbconn, 
    "select_all_categories", 
    array()
  );

  $result = array_map(function ($cat) {

    if (is_null($cat['ParentID'])) {
      return new Category(
        $cat['ID'],
        $cat['Name'],
        $cat['Path']
      );
    }

    return new Category(
      $cat['ID'],
      $cat['Name'],
      $cat['Path'],
      $cat['ParentID']
    );

  }, pg_fetch_all($result));

  return $result;
}

/**
 * Fetch Child Category List
 * 
 * @param string $parentID
 * @return Category[] Category List
 */
function fetchChildCategoryList (
  ?string $ParentID = null
) {
  
  $sth = $dbh->prepare('SELECT * 
    FROM `Categories`
    WHERE `ParentID` = ?');
  
  $sth->bindParam(1, $ParentID, PDO::PARAM_STR, 256);
  
  $sth->execute();

  $result = array_map(function ($cat) {
    return new Category(
      $cat['ID'],
      $cat['Name'],
      $cat['Path'],
      $cat['ParentID']
    );
  }, $sth->fetchAll(PDO::FETCH_ASSOC));

  return $result;
}