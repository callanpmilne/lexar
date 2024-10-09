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
    ', 
    array()
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

  }, pg_fetch_all($result));

  $GLOBALS['entityTypes'] = $result;

  return $result;
}
