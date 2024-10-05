<?php

require_once("../src/class/Module.php");

/**
 * Summary of generateDBFetchListSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateDBFetchListSourceFile (
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
  END;

pg_prepare(
  $GLOBALS['dbh'], 
  "select_all_<?=$sepWithUnderscore['LcPlural']?>", 
  $qFetchListSql
);

/**
 * Fetch <?=$module->name->UcSingular?> List
 * 
 * @return <?=$module->name->UcSingular?>[] <?=$module->name->UcSingular?> List
 */
function fetch<?=$module->name->UcSingular?>List () {

  if (count($GLOBALS['<?=$module->name->LcPlural?>']) &gt; 0) {
    return $GLOBALS['<?=$module->name->LcPlural?>'];
  }

  $dbconn = $GLOBALS['dbh'];

  $result = pg_execute(
    $dbconn, 
    "select_all_<?=$sepWithUnderscore['LcPlural']?>", 
    array()
  );

  $result = array_map(function ($cat) {

    if (is_null($cat['ParentID'])) {
      return new <?=$module->name->UcSingular?>(
        $cat['ID'],
        $cat['Name'],
        $cat['Path']
      );
    }

    return new <?=$module->name->UcSingular?>(
      $cat['ID'],
      $cat['Name'],
      $cat['Path'],
      $cat['ParentID']
    );

  }, pg_fetch_all($result));

  $GLOBALS['<?=$module->name->LcPlural?>'] = $result;

  return $result;
}

<?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}
