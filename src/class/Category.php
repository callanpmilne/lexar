<?php

/**
 * Category Class
 */
class Category {

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
  public function __construct (string $name, string $path, ?string $parentPath = null) {
    $this->Name = $name;
    $this->Path = $path;
    $this->ParentID = $parentPath; // Parent Category
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
