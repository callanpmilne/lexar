<?php

/**
 * Category Class
 */
class Category
  implements JsonSerializable
{

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

  public function jsonSerialize (
    // no agrs
  ): mixed {
    return get_object_vars($this);
  }

  /**
   * Matches
   * 
   * @param string $query The text string to match
   * @return bool TRUE if anything on this Category matches $query
   */
  public function matches (
    string $query
  ): bool {
    if (stripos($this->Name, $query) > -1) {
      return true;
    }

    if (stripos($this->Path, $query) > -1) {
      return true;
    }

    if (stripos($this->ID, $query) > -1) {
      return true;
    }

    if (isset($this->Parent) && stripos($this->Parent, $query) > -1) {
      return true;
    }

    return false;
  }

}
