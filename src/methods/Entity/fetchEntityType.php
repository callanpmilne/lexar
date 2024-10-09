<?php

require_once('../src/class/Entities/Detailed/EntityType.php');

/**
 * Entity Type
 * 
 * Shows a single EntityType (as a DetailedEntityType)
 */

/**
 * Fetch Entity Type 
 * 
 * @param string $ID Entity Type ID
 * @return DetailedEntityType
 */
function fetchEntityType (
  string $ID
): DetailedEntityType {

  $result = pg_query_params(
    $GLOBALS['dbh'], 
    ' SELECT
        ET."ID" AS "TypeID",
        EN."ID" AS "NameID",
        ET."ParentID" AS "TypeParentID",
        ET."IsAbstract" AS "TypeIsAbstract",
        EN."Label" AS "TypeLabel",
        EN."PascalCaseName" AS "TypeName",
        EN."PluralReplacements" AS "TypeNamePluralReplacements"
      FROM
        public."EntityType" ET
      LEFT JOIN
        public."EntityName" EN
      ON
        ET."EntityNameID" = EN."ID"
      WHERE
        ET."ID" = $1
    ', 
    array(
      $ID,
    )
  );

  $result = array_map(function ($ent) {
    
    return new DetailedEntityType(
      $ent['TypeID'],
      $ent['NameID'],
      $ent['TypeLabel'],
      $ent['TypeName'],
      $ent['TypeNamePluralReplacements'],
      $ent['TypeIsAbstract'],
      $ent['TypeParentID'],
    );

  }, [pg_fetch_assoc($result)]);

  return $result[0];
}