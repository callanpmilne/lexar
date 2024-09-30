<?php

require_once('../src/class/Hash.php');

/**
 * UserHash Class
 */
class UserHash extends Hash {

  public static string $PASSWORD_TYPE = 'PASSWORD';
  public static string $OTP_TYPE = 'OTP';

  /**
   * User Hash GUID
   */
  public string $UserHashID;

  /**
   * User ID
   */
  public string $UserID;

  /**
   * Hash ID
   */
  public string $HashID;

  /**
   * Hash Type 
   * Intended usage for this Hash (e.g. PASSWORD, OTP)
   */
  public string $Type;

  /**
   * Date Created
   */
  public string $Created;

  /**
   * Date Last Modified
   * Date HashValue was last modified
   */
  public string $LastModified;
  
  /**
   * Constructor
   * 
   * @param string $UserHashID Hash GUID
   * @param string $UserID User ID
   * @param string $HashID Hash ID
   * @param string $HashValue Hash Value
   * @param string $Type Intended Usage (e.g. PASSWORD, OTP)
   * @param int $Created Date Created
   * @param int $LastModified Date HashValue was last modified
   */
  public function __construct (
    string $UserHashID, 
    string $UserID,
    string $HashID,
    string $HashValue,
    string $Type,
    int $Created,
    int $LastModified
  ) {
    parent::__construct(
      $HashID,
      $HashValue
    );

    $this->UserHashID = $UserHashID;
    $this->UserID = $UserID;
    $this->HashID = $HashID;
    $this->Type = "" !== $Type ? $Type : UserHash::$PASSWORD_TYPE;
    $this->Created = $Created;
    $this->LastModified = $LastModified;
  }

  /**
   * Verify Input
   * 
   * Checks if given string ($input) is a match for $this->Value
   * 
   * @param string $input String to check
   * @return bool True if given string ($input) is a match
   */
  public function verify(
    string $input
  ) {
    return password_verify(
      $input,
      $this->HashValue
    );
  }

}
