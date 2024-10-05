<?php

require_once("../src/class/Module.php");

/**
 * Summary of generateDBCreateSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateDBCreateSourceFile (
  LexarModule $module
): string {
  ob_start();
  $sepWithUnderscore = [
    'LcPlural' => strtolower(preg_replace('/([A-Z])/', "_$1", $module->name->LcPlural)),
    'LcSingular' => strtolower(preg_replace('/([A-Z])/', "_$1", $module->name->LcSingular)),
  ];
  
  ?>&lt;?php

require_once('../src/class/<?=$module->name->UcSingular?>.php');

/**
  * @var string SQL Query
  */
$qInsertNew<?=$module->name->UcSingular?>Sql = &lt;&lt;&lt;END
  INSERT INTO 
    public."<?=$module->name->UcPlural?>" 
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
  )
  END;

// Register the SQL Query
pg_prepare(
  $GLOBALS['dbh'],
  "insert_new_<?=$sepWithUnderscore['LcSingular']?>", 
  $qInsertNew<?=$module->name->UcSingular?>Sql
);

/**
  * Create <?=$module->name->UcSingular?>
  * 
  * @param <?=$module->name->UcSingular?> $<?=$module->name->LcSingular?>
  */
function create<?=$module->name->UcSingular?> (
  <?=$module->name->UcSingular?> $<?=$module->name->LcSingular?>
) {
  try {
    return insert<?=$module->name->UcSingular?>(
      $<?=$module->name->LcSingular?>-&gt;ParentID,
      $<?=$module->name->LcSingular?>-&gt;ID,
      $<?=$module->name->LcSingular?>-&gt;RelativeID,
      $<?=$module->name->LcSingular?>-&gt;SecondRelativeID,
      $<?=$module->name->LcSingular?>-&gt;Name,
      $<?=$module->name->LcSingular?>-&gt;Path,
      $<?=$module->name->LcSingular?>-&gt;Content,
      $<?=$module->name->LcSingular?>-&gt;Created
    );
  }
  catch (Exception $e) {
    return false;
  }
}

/**
 * Insert <?=$module->name->UcSingular?>
 * 
 * @param string $name New <?=$module->name->UcSingular?> Name
 * @param string $Name
 * @param int $Added
 * @param string|null $ParentID
 */
function insert<?=$module->name->UcSingular?> (
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
    "insert_new_<?=$sepWithUnderscore['LcSingular']?>", 
    array(
      $ParentID,
      $ID,
      $RelativeID,
      $SecondRelativeID,
      $Name,
      $Path,
      $Content,
      $Created &gt; 0 ? $Created : time()
    )
  );

  return pg_affected_rows($result) &gt; 0;

}
<?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}
