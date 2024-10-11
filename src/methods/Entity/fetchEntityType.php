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
        EN."PluralReplacements" AS "TypeNamePluralReplacements",
        COUNT(ETA."ID") AS "AttributeCount",
        PEN."Label" AS "ParentLabel"
      FROM
        public."EntityType" ET
      LEFT JOIN
        public."EntityAttribute" ETA
      ON
        ET."ID" = ETA."EntityTypeID"
      LEFT JOIN
        public."EntityName" EN
      ON
        ET."EntityNameID" = EN."ID"
      LEFT JOIN
        public."EntityType" PET
      ON
        ET."ParentID" = PET."ID"
      LEFT JOIN
        public."EntityName" PEN
      ON
        PET."EntityNameID" = PEN."ID"
      WHERE
        ET."ID" = $1
      GROUP BY
        ET."ID", EN."ID", PEN."Label"
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
      't' === $ent['TypeIsAbstract'],
      $ent['AttributeCount'],
      $ent['TypeParentID'],
      $ent['ParentLabel'],
    );

  }, [pg_fetch_assoc($result)]);

  return $result[0];
}