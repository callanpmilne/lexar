<?php

/**
 * Note Class
 */
class Note {

  /**
   * GUID
   */
  public ?string $ID;

  /**
   * Content Body
   */
  public ?string $ContentBody;

  /**
   * Date Created
   */
  public ?string $CreatedDate;

  /**
   * Date Last Modified
   */
  public ?string $ModifiedDate;
  
  /**
   * Constructor
   * 
   * @param string $ID Note GUID
   */
  public function __construct (?string $ID = null) {
    $this->ID = $ID;

    if (is_null($ID)) {
      $this->CreatedDate = time();
    }
  }

  public function setContentBody (string $newValue) {
    $this->ContentBody = $newValue;
    $this->ModifiedDate = time();
  }

}
