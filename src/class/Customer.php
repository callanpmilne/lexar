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

  public function getShortID () {
    return sprintf(
      '%s...%s',
      substr($this->ID, 0, 4),
      substr($this->ID, -4, 4),
    );
  }

  /**
   * Matches
   * 
   * @param string $query The text string to match
   * @return bool TRUE if anything on this Customer matches $query
   */
  public function matches (
    string $query
  ): bool {
    if (stripos($this->Name, $query) > -1) {
      return true;
    }

    if (stripos($this->ID, $query) > -1) {
      return true;
    }

    return false;
  }

}
