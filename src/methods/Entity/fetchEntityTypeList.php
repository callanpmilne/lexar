<?php

require_once('../src/class/Entities/Detailed/EntityType.php');

$GLOBALS['entityTypes'] = [];

/**
 * Fetch Detailed Entity Type List
 * 
 * @return DetailedEntityType[] List of Entity Types
 */
function fetchEntityTypeList () {

  if (count($GLOBALS['entityTypes']) > 0) {
    return $GLOBALS['entityTypes'];
  }

  $result = pg_query_params(
    $GLOBALS['dbh'], 
    ' SELECT
        ET."ID" AS "TypeID",
        EN."ID" AS "NameID",
        ET."ParentID" AS "ParentID",
        ET."IsAbstract" AS "IsAbstract",
        EN."Label" AS "Label",
        EN."PascalCaseName" AS "Name",
        EN."PluralReplacements" AS "PluralReplacements",
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
      GROUP BY
        ET."ID", EN."ID", PEN."Label"
      ORDER BY
        PEN."Label" 
          ASC
    ', 
    array()
  );

  $result = array_map(function ($ent) {

    return new DetailedEntityType(
      $ent['TypeID'],
      $ent['NameID'],
      $ent['Label'],
      $ent['Name'],
      $ent['PluralReplacements'],
      $ent['IsAbstract'],
      $ent['AttributeCount'] ?? 0,
      $ent['ParentID'] ?? null,
      $ent['ParentLabel'] ?? '',
    );

  }, pg_fetch_all($result));

  $GLOBALS['entityTypes'] = $result;

  return $result;
}
