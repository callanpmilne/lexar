<?php

require_once('../src/class/Entities/EntityType.php');

/**
  * Create Entity Type
  * 
  * @param EntityType $entityType
  */

function createEntityType (
  EntityType $entityType
): bool {
  try {
    $ParentID = isset($entityType->ParentID)
      ? $entityType->ParentID : null;
    
    if (!$ParentID) {
      return insertEntityType($entityType);
    }

    return insertChildEntityType($entityType);
  }
  catch (Exception $e) {
    return false;
  }
}

function insertEntityType (
  EntityType $entityType
): bool {
  
  $abstract = $entityType->IsAbstract 
    ? 'true' : 'false';
  
  $result = pg_query_params(
    $GLOBALS['dbh'], 
    ' INSERT 
        INTO 
          public."EntityType" 
          (
            "ID",
            "EntityNameID",
            "IsAbstract"
          )
        VALUES
          (
            $1,
            $2,
            '.($abstract).'
          );
    ', 
    array(
      $entityType->ID,
      $entityType->EntityNameID,
    )
  );

  try {
    return pg_affected_rows($result) > 0;
  }
  catch (Exception $e) {
    throw $e; // bubble up
  }
  
  return false;

}

function insertChildEntityType (
  EntityType $entityType
): bool {
  
  $abstract = $entityType->IsAbstract 
    ? 'true' : 'false';
    
  $result = pg_query_params(
    $GLOBALS['dbh'],
    ' INSERT 
        INTO 
          public."EntityType" 
          (
            "ID",
            "ParentID",
            "EntityNameID",
            "IsAbstract"
          )
        VALUES
          (
            $1,
            $2,
            $3,
            '.($abstract).'
          );
      ', 
    array(
      $entityType->ID,
      $entityType->ParentID,
      $entityType->EntityNameID,
    )
  );

  try {
    return pg_affected_rows($result) > 0;
  }
  catch (Exception $e) {
    throw $e; // bubble up
  }
  
  return false;

}
