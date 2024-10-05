<?php

require_once("../src/class/Module.php");

/**
 * Summary of generateDBFetchSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateDBFetchSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  $sepWithUnderscore = [
    'LcPlural' => strtolower(preg_replace('/([A-Z])/', "_$1", $module->name->LcPlural)),
    'LcSingular' => strtolower(preg_replace('/([A-Z])/', "_$1", $module->name->LcSingular)),
  ];
  
  ?>&lt;?php

$GLOBALS['<?=$module->name->LcPlural?>'] = [];

/**
 * @var string SQL Query
 */
$qFetchListSql = &lt;&lt;&lt;END
  SELECT 
    *
  FROM
    public."<?=$module->name->UcPlural?>"
  WHERE
    "ID" = $1
  END;

// Register the SQL Query
pg_prepare(
  $GLOBALS['dbh'],
  "select_one_<?=$sepWithUnderscore['LcSingular']?>_by_id", 
  $qFetchListSql
);

/**
 * Fetch <?=$module->name->UcSingular?>
 * 
 * @param string $ID <?=$module->name->UcSingular?> ID
 * @return <?=$module->name->UcSingular?> 
 */
function fetch<?=$module->name->UcSingular?> (
  string $ID
) {

  $dbconn = $GLOBALS['dbh'];

  $result = pg_execute(
    $dbconn, 
    "select_one_<?=$sepWithUnderscore['LcSingular']?>_by_id", 
    array(
      $ID,
    )
  );

  $result = array_map(function ($r) {
    return new <?=$module->name->UcSingular?>(
      $r['ID'],
      $r['RelativeID'],
      $r['SecondRelativeID'],
      $r['Name'],
      $r['Path'],
      $r['Content'],
      $r['Created'],
      isset($r['Deleted']) ? $r['Deleted'] : null,
      isset($r['ParentID']) ? $r['ParentID'] : = null
    );
  }, [pg_fetch_assoc($result)]);

  return $result[0];
}

  <?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}
