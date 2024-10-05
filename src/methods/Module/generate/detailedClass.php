<?php

require_once("../src/class/Module.php");

/**
 * Summary of generateDetailedClassSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateDetailedClassSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  ?>&lt;?php

require_once("../src/class/<?=$module->name->UcSingular?>.php");

/**
 * Detailed <?=$module->name->UcSingular?> Class
 */
class Detailed<?=$module->name->UcSingular?> {
  /**
   * @var string Parent ID
   */
  public ?string $ParentID;

  /**
   * @var string Unique ID
   */
  public string $ID;

  /**
   * @var string Relative ID
   */
  public string $RelativeID;

  /**
   * @var string Second Relative ID
   */
  public string $SecondRelativeID;

  /**
   * @var string Display Name
   */
  public string $Name;
  
  /**
   * @var string Path (e.g. animals/cat)
   */
  public string $Path;

  /**
  * @var string Full-Text Content
  */
  public string $Content;

  /**
   * @var int Created Date as a unix timestamp
   */
  public int $Created;

  /**
   * @var int Deleted Date as a unix timestamp (not deleted if this is unset/empty)
   */
  public ?int $Deleted;

  /**
   * Constructor
   * 
   * @param string $ID
   * @param string $RelativeID
   * @param string $SecondRelativeID
   * @param string $Name Display Name
   * @param string $Path Path (e.g. animals/cat)
   * @param string $Content
   * @param int $Created
   * @param int $Deleted
   * @param string $ParentID
   */
  public function __construct (
    string $ID,
    string $RelativeID,
    string $SecondRelativeID,
    string $Name,
    string $Path,
    string $Content,
    int $Created,
    ?int $Deleted = null,
    ?string $ParentID = null
  ) {
    $this->ID = $ID;
    $this->RelativeID = $RelativeID;
    $this->SecondRelativeID = $SecondRelativeID;
    $this->Name = $Name;
    $this->Path = $Path;
    $this->Content = $Content;
    $this->Created = $Created;
    
    if (!is_null($Deleted)) {
      $this-&gt;Deleted = $Deleted; // Date <?=$module->name->UcSingular?> was deleted
    }
    
    if (!is_null($ParentID)) {
      $this-&gt;ParentID = $ParentID; // Parent <?=$module->name->UcSingular.' '?> 
    }
  }

  /**
   * Is Nested
   * 
   * Determine if a <?=$module->name->LcSingular?> has a parent <?=$module->name->LcSingular?>.
   * 
   * @return boolean True if <?=$module->name->LcSingular?> is a child
   */
  public function isNested () {
    return isset($this-&gt;ParentID);
  }

} <?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}
  