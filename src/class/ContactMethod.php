<?php

/**
 * Contact Method Class
 */
class ContactMethod {

  /**
   * Unique ID
   */
  public string $ID;

  /**
   * Contact Method
   * E.g. Phone, Email, Facebook
   */
  public string $Medium;
  
  /**
   * Unique Identifier on Medium
   */
  public string $Identifier;

  /**
   * Date Contact Method Added
   */
  public ?int $Added;

  /**
   * Date Last Modified
   */
  public ?int $Modified;

  /**
   * Constructor
   * 
   * @param string $ID Unique ID
   * @param string $Medium Mode of contact (e.g. Phone, Email, Messenger)
   * @param string $Identifier Unique Identifier on Medium (e.g. Phone number or Email Address)
   * @param string $Added Date Added
   * @param string $Modified Last Modified Date
   */
  public function __construct (
    string $ID,
    string $Medium,
    string $Identifier,
    ?int $Added = null,
    ?int $Modified = null
  ) {
    $this->ID = $ID;
    $this->Medium = $Medium;
    $this->Identifier = $Identifier;
    
    if (!is_null($Added)) {
      $this->Added = $Added; // Date Added
    }
    
    if (!is_null($Modified)) {
      $this->Modified = $Modified; // Date Modified
    }
  }

}
