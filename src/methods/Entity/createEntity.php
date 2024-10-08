<?php

require_once('../src/class/Entities/Entity.php');

/**
  * @var string SQL Query
  */
$qInsertNewEntitySql = <<<END
  INSERT INTO public."Entity" 
    (
      "ParentID",
      "ID",
      "RelativeID",
      "SecondRelativeID",
      "Name",
      "Path",
      "Content",
      "Created"
    )
  VALUES 
    (
      $1,
      $2,
      $3,
      $4,
      $5,
      $6,
      $7,
      $8
    );
  END;

// Register the SQL Query
pg_prepare(
  $GLOBALS['dbh'],
  "insert_new_entity", 
  $qInsertNewEntitySql
);

/**
  * Create Entity 
  * 
  * @param Entity $entity
  */
function createEntity (
  Entity $entity) {
  try {
    return insertEntity(
      $entity->ParentID,
      $entity->ID,
      $entity->RelativeID,
      $entity->SecondRelativeID,
      $entity->Name,
      $entity->Path,
      $entity->Content,
      $entity->Created
    );
  }
  catch (Exception $e) {
    return false;
  }
}

/**
 * Insert Entity 
 * 
 * @param string $name New Entity Name
 * @param string $Name
 * @param int $Added
 * @param string|null $ParentID
 */
function insertEntity (
  string|null $ParentID,
  string $ID,
  string $RelativeID,
  string $SecondRelativeID,
  string $Name,
  string $Path,
  string $Content,
  int $Created
) {

  $dbconn = $GLOBALS['dbh'];

  $result = pg_execute(
    $dbconn,
    "insert_new_entity", 
    array(
      $ParentID,
      $ID,
      $RelativeID,
      $SecondRelativeID,
      $Name,
      $Path,
      $Content,
      $Created > 0 ? $Created : time()
    )
  );

  return pg_affected_rows($result) > 0;

}