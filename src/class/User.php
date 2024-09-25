<?php

/**
 * User Class
 */
class User {

  /**
   * GUID
   */
  public ?string $ID;
  
  /**
   * Constructor
   * 
   * @param string $ID User GUID
   */
  public function __construct (?string $ID = null) {
    $this->ID = $ID;
  }

}
