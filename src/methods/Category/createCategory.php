<?php

/**
 * Create Category
 * 
 * @param Category $cat
 */
function createCategory (
  Category $cat
) {

  try {
    insertCategory($cat->Name, $cat->ParentID);
    return true;
  }
  catch (Exception $e) {
    return false;
  }

}

/**
 * Insert Category
 * 
 * @param string $name New Category Name
 * @param int $parentID New Category Parent (if any)
 */
function insertCategory (
  string $name,
  ?int $parentID = null,
) {

  $sth = $dbh->prepare('INSERT
    INTO 
      `Categories` (
        `Name`, 
        `Parent`
      ) 
    VALUES 
      (
        ?, 
        ?
      )');
  
  $sth->bindParam(1, $name, PDO::PARAM_STR, 128);
  $sth->bindParam(2, is_null($parentID) ? null : $parentID, PDO::PARAM_STR, 256);

  $sth->execute();

}