<?php

require_once("../src/class/Entities/EntityType.php");

class DetailedEntityType extends EntityType {

  /**
   * @var string Type ID
   */
  public string $TypeID;
  
  /**
   * @var string Name ID
   */
  public string $NameID;
  
  /**
   * @var string Label
   */
  public string $Label;
  
  /**
   * @var string Type Name
   */
  public string $Name;

  /**
   * @var string Plural Replacement Rules
   */
  public string $PluralReplacements;

  /**
   * Constructor Function
   * 
   * @param string $TypeID
   * @param string $NameID
   * @param string $Label
   * @param string $Name
   * @param string $PluralReplacements
   * @param bool $IsAbstract
   * @param string $ParentID
   */
  public function __construct(
    string $TypeID,
    string $NameID,
    string $Label,
    string $Name,
    string $PluralReplacements,
    bool $IsAbstract = false,
    ?string $ParentID = null,
  ) {
    parent::__construct(
      $TypeID,
      $NameID,
      $IsAbstract = false,
      $ParentID = null
    );

    $this->Name = $Name;
    $this->Label = $Label;
    $this->NameID = $NameID;
    $this->PluralReplacements = $PluralReplacements;
  }

  /**
   * Matches
   * 
   * @param string $query The text string to match
   * @return bool TRUE if anything on this EntityType matches $query
   */
  public function matches (
    string $query
  ): bool {
    if (true === parent::matches($query)) {
      return true;
    }

    if (stripos($this->Label, $query) > -1) {
      return true;
    }

    if (stripos($this->Name, $query) > -1) {
      return true;
    }

    if (stripos($this->PluralReplacements, $query) > -1) {
      return true;
    }

    return false;
  }
}
