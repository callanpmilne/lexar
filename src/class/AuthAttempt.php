<?php

/**
 * Auth Attempt Class
 */
class AuthAttempt {

  /**
   * Login Username
   */
  private string $Username;

  /**
   * Password
   */
  private string $Password;
  
  /**
   * Constructor
   * 
   * @param string $Username Login Username
   * @param string $Password Password
   */
  public function __construct (string $Username, string $Password) {
    $this->Username = $Username;
    $this->Password = $Password;
  }

  /**
   * Get User ID
   * 
   * @return string Username used in this auth attempt
   */
  public function getUsername () {
    return $this->Username;
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
