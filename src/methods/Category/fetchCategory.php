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
  
  $sth = $dbh->prepare('SELECT * 
    FROM `Categories`
    WHERE `ID` = ?');
  
  $sth->bindParam(1, $ID, PDO::PARAM_STR, 256);
  
  $sth->execute();

  $result = array_map(function ($cat) {
    return new Category(
      $cat['ID'],
      $cat['Name'],
      $cat['Path'],
      $cat['ParentID']
    );
  }, $sth->fetch(PDO::FETCH_ASSOC));

  return $result[0];
}