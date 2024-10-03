<?php

/**
 * Hash Class
 */
class Hash {

  /**
   * Hash GUID
   */
  public string $ID;

  /**
   * Hash Value
   */
  public string $HashValue;
  
  /**
   * Constructor
   * 
   * @param string $ID Hash GUID
   */
  public function __construct (
    string $ID, 
    string $HashValue
  ) {
    $this->ID = $ID;
    $this->HashValue = $HashValue;
  }

}
