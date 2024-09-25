<?php

/**
 * Profile Class
 */
class Profile {

  /**
   * Name
   */
  public string $Name;
  
  /**
   * Constructor
   * 
   * @param string $Name Name
   */
  public function __construct (string $Name) {
    $this->Name = $Name;
  }

}
