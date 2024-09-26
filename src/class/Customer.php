<?php

/**
 * Customer Class
 */
class Customer {

  /**
   * Customer GUID
   */
  public string $ID;

  /**
   * Customer Name
   */
  public string $Name;
  
  /**
   * Constructor
   * 
   * @param string $ID Customer GUID
   * @param string $Name Customer Name
   */
  public function __construct (
    string $ID,
    string $Name
  ) {
    $this->ID = $ID;
    $this->Name = $Name;
  }

}
