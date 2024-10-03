<?php

/**
 * Social ID Class
 */
class SocialID {

  /**
   * GUID
   */
  public ?string $ID;

  /**
   * Social ID
   */
  public ?string $Link;
  
  /**
   * Constructor
   * 
   * @param string $ID Social ID GUID
   * @param string $Link Social Link GUID
   */
  public function __construct (?string $ID = null, ?string $Link = null) {
    $this->ID = $ID;
    $this->Link = $Link;
  }

  public function setLink (string $newValue) {
    $this->Link = $newValue;
  }

}
