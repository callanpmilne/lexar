<?php

/**
 * Organisation Class
 */
class Organisation {
  /**
   * @var string $ID Org ID
   */
  public string $ID;

  /**
   * @var string $Name Org Name
   */
  public string $Name;

  /**
   * @var int $Added Org Added Timestamp (seconds since epoch)
   */
  public int $Added;

  /**
   * @var ?string $ParentID Parent Org ID (top-level if none)
   */
  public ?string $ParentID = null;

  /**
   * Organisation
   * 
   * @param string $ID Globally Unique Org ID
   * @param string $Name Org Name
   * @param int $Added Org Added Timestamp
   * @param ?string $ParentID Parent Organisation ID (or null if not a child)
   */
  public function __construct (
    string $ID,
    string $Name,
    int $Added,
    ?string $ParentID = null
  ) {
    $this->ID = $ID;
    $this->Name = $Name;
    $this->Added = $Added;
    
    if (!is_null($ParentID)) {
      $this->ParentID = $ParentID;
    }
  }

  public function getShortID () {
    return sprintf(
      '%s...%s',
      substr($this->ID, 0, 4),
      substr($this->ID, -4, 4),
    );
  }
}