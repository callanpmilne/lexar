<?php

/**
 * Customer Class
 */
class Customer {

  /**
   * GUID
   */
  public ?string $ID;
  
  /**
   * Constructor
   * 
   * @param string $ID Customer GUID
   */
  public function __construct (?string $ID = null) {
    $this->ID = $ID;
  }

}
