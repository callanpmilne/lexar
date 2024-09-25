<?php

/**
 * Fetch Category List
 * 
 * @param string $parentID
 * @return Category[] Category List
 */
function fetchCategoryList (
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