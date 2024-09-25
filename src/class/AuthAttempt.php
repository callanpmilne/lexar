<?php

/**
 * Auth Attempt Class
 */
class AuthAttempt {

  /**
   * Login Input Name
   */
  private string $InputName;

  /**
   * Password
   */
  private string $Password;
  
  /**
   * Constructor
   * 
   * @param string $InputName Login Input Name
   * @param string $Password Password
   */
  public function __construct (string $InputName, string $Password) {
    $this->InputName = $InputName;
    $this->Password = $Password;
  }

  /**
   * Get User ID
   * 
   * @return string InputName used in this auth attempt
   */
  public function getInputName () {
    return $this->InputName;
  }

  /**
   * Get Password
   * 
   * @return string Password used in this auth attempt
   */
  public function getPassword () {
    return $this->Password;
  }

}
