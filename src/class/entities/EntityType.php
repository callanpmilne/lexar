<?php

/**
 * Summary of Entity Type
 */
class EntityType {

  /**
   * @var string $ID The Universally Unique ID (UUID) for the type
   */
  public string $ID;

  /**
   * @var string $ParentID The Parent Type UUID, or NULL if top-level type
   */
  public ?string $ParentID;

  /**
   * @var string $EntityNameID UUID for the Entity Name to use for this Type
   */
  public string $EntityNameID;

  /**
   * @var bool $IsAbstract TRUE if this type is an Abstract (incomplete) type
   */
  public bool $IsAbstract;

  /**
   * Constructor Function
   * 
   * @param string $ID Universally Unique ID (UUID) for the type
   * @param string $EntityNameID Parent Type UUID, or NULL if top-level type
   * @param bool $IsAbstract Type is Abstract? (requires completion from another class)
   * @param ?string $ParentID Parent Type UUID, or NULL if top-level type
   */
  public function __construct (
    string $ID,
    string $EntityNameID,
    bool $IsAbstract = false,
    ?string $ParentID = null
  ) {
    $this->ID = $ID;
    $this->EntityNameID = $EntityNameID;

    $this->IsAbstract = $IsAbstract;
    
    if (isset($ParentID)) {
      $this->ParentID = $ParentID;
    }
  }

  /**
   * Matches
   * 
   * @param string $query The text string to match
   * @return bool TRUE if anything on this Entity Type matches $query
   */
  public function matches (
    string $query
  ): bool {
    if (stripos($this->ID, $query) > -1) {
      return true;
    }
    
    if (stripos($this->EntityNameID, $query) > -1) {
      return true;
    }
    
    if (isset($this->ParentID) && stripos($this->ParentID, $query) > -1) {
      return true;
    }

    return false;
  }

}
