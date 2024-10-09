<?php

require_once('../src/class/Entities/Entity.php');

/**
  * @var string SQL Query
  */
$qInsertNewEntitySql = <<<END
  INSERT INTO public."Entity" 
    (
      "ID",
      "TypeID",
    )
  VALUES 
    (
      $1,
      $2
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
  Entity $entity
) {
  try {
    return insertEntity(
      $entity->ID,
      $entity->TypeID
    );
  }
  catch (Exception $e) {
    return false;
  }
}

/**
 * Insert Entity 
 * 
 * @param string $ID Entity UUID
 * @param string $TypeID Entity Type UUID
 */
function insertEntity (
  string $ID,
  string $TypeID
) {

  $dbconn = $GLOBALS['dbh'];

  $result = pg_execute(
    $dbconn,
    "insert_new_entity", 
    array(
      $ID,
      $TypeID,
    )
  );

  return pg_affected_rows($result) > 0;

}