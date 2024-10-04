<?php

require_once('../src/class/Category.php');

/**
 * @var string SQL Query
 */
$qInsertNewCategorySql = <<<END
  INSERT INTO 
    public."Categories" 
      (
        "ParentID",
        "ID",
        "Name",
        "Added"
    ) 
  VALUES 
    (
      $1,
      $2,
      $3,
      $4
  )
  END;

// Register the SQL Query
pg_prepare(
  $GLOBALS['dbh'],
  "insert_new_category", 
);

/**
 * Create Category
 * 
 * @param Category $category
 */
function createCategory (
  Category $category
) {
  try {
    return insertCategory(
      $category->ID,
      $category->Name,
      $category->Added,
      $category->ParentID,
    );
  }
  catch (Exception $e) {
    return false;
  }
}

/**
 * Insert Category
 * 
 * @param string $name New Category Name
 * @param string $Name
 * @param int $Added
 * @param string|null $ParentID
 */
function insertCategory (
  string $ID,
  string $Name,
  int $Added = 0,
  string|null $ParentID = null
) {

  $dbconn = $GLOBALS['dbh'];

  $result = pg_execute(
    $dbconn,
    "insert_new_category", 
    array(
      $ParentID,
      $ID,
      $Name,
      $Added > 0 ? $Added : time()
    )
  );

  return pg_affected_rows($result) > 0;

}