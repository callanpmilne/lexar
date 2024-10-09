<?php

require_once('../src/class/Entities/EntityType.php');
require_once('../src/class/Entities/EntityName.php');

/**
  * Create Entity Name

  * Inserts a new DB row/record in the EntityName table.
  * 
  * @param EntityName $entityName
  */
function createEntityName (
  EntityName $entityName
) {
  try {

    $dbconn = $GLOBALS['dbh'];
  
    $result = pg_query_params(
      $GLOBALS['dbh'],
      ' INSERT INTO public."EntityName" 
          (
            "ID",
            "Label",
            "NiceName",
            "PascalCaseName",
            "CamelCaseName",
            "SnakeCaseName",
            "PluralReplacements"
          )
        VALUES 
          (
            $1,
            $2,
            $3,
            $4,
            $5,
            $6,
            $7
          );
      ', 
      array(
        $entityName->ID,
        $entityName->Label,
        $entityName->NiceName,
        $entityName->PascalCaseName,
        $entityName->CamelCaseName,
        $entityName->SnakeCaseName,
        $entityName->PluralReplacements,
      )
    );
  
    return pg_affected_rows($result) > 0;

  }
  catch (Exception $e) {
    return false;
  }
}
