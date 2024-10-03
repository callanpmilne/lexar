<?php

/**
 * Category Class
 */
class Category {

  /**
   * Unique ID
   */
  public string $ID;

  /**
   * Display Name
   */
  public string $Name;
  
  /**
   * Full Path (e.g. animals/cat)
   */
  public string $Path;

  /**
   * Parent ID
   */
  public ?string $ParentID;

  /**
   * Constructor
   * 
   * @param string $name Display Name
   * @param string $path Full Path (e.g. animals/cat)
   * @param string $parentPath Parent's Full Path (if any)
   */
  public function __construct (
    string $ID, 
    string $Name, 
    string $Path, 
    ?string $ParentID = null
  ) {
    $this->ID = $ID;
    $this->Name = $Name;
    $this->Path = $Path;
    
    if (!is_null($ParentID)) {
      $this->ParentID = $ParentID; // Parent Category
    }
  }

  /**
   * Is Nested
   * 
   * Determine if a category has a parent category.
   * 
   * @return boolean True if category is a child
   */
  public function isNested () {
    return isset($this->ParentID);
  }

}
