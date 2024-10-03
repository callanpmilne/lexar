<?php

/**
 * User Class
 */
class User {

  /**
   * User ID
   */
  public string $ID;

  /**
   * Username
   */
  public string $Username;

  /**
   * Name
   */
  public string $Name;

  /**
   * IsSuperAdmin
   */
  protected bool $IsSuperAdmin;
  
  /**
   * Constructor
   * 
   * @param string $ID
   * @param string $Username
   * @param string $Name
   * @param bool $IsSuperAdmin
   */
  public function __construct (
    string $ID,
    string $Username,
    string $Name,
    bool $IsSuperAdmin = false
  ) {
    $this->ID = $ID;
    $this->Username = $Username;
    $this->Name = $Name;
    $this->IsSuperAdmin = $IsSuperAdmin;
  }

  /**
   * Read 
   */
  public function __get(string $name) {
    switch ($name) {
      case 'IsSuperAdmin':
        return $this->IsSuperAdmin ? true : false;
        break;
    }

    $trace = debug_backtrace();
    trigger_error(
      'Undefined property via __get(): ' . $name .
      ' in ' . $trace[0]['file'] .
      ' on line ' . $trace[0]['line'], 
      E_USER_NOTICE
    );
    return null;
  }
}
