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
  public string $ParentID = null;

  /**
   * @var string $EntityNameID UUID for the Entity Name to use for this Type
   */
  public string $EntityNameID;

  /**
   * @var bool $IsAbstract TRUE if this type is an Abstract (incomplete) type
   */
  public bool $IsAbstract = false;

  /**
   * Constructor Function
   * 
   * @param string $ID Universally Unique ID (UUID) for the type
   * @param ?string $ParentID Parent Type UUID, or NULL if top-level type
   * @param ?string $EntityNameID Parent Type UUID, or NULL if top-level type
   * @param ?bool $IsAbstract Type is Abstract? (requires completion from another class)
   */
  public function __construct (
    string $ID,
    ?string $ParentID = null,
    ?string $EntityNameID = null,
    ?bool $IsAbstract = false
  ) {
    $this->ID = $ID;
    
    if (isset($ParentID)) {
      $this->ParentID = $ParentID;
    }
    
    if (isset($EntityNameID)) {
      $this->EntityNameID = $EntityNameID;
    }

    if (isset($IsAbstract)) {
      $this->IsAbstract = $IsAbstract;
    }
  }

}
