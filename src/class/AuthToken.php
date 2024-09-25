<?php

/**
 * Auth Token Class
 */
class AuthToken {

/**
 * User ID
 */
private string $UserID;

/**
 * Secret Key
 */
private string $Secret;

/**
 * Issue Date
 */
private int $Issued;

/**
 * Expiry (seconds)
 */
private ?int $Expiry;

/**
 * Generate An Auth Token
 * 
 * @param string $UserID ID of the User this Token authorises
 * @param int $Expiry The number of seconds the Token is valid for
 */
public static function generate (
  string $UserID,
  ?int $Expiry = null
) {
  $Secret = AuthToken::generateSecret();
  $Issued = time();

  return new AuthToken(
    $UserID,
    $Secret,
    $Issued,
    $Expiry
  );
}

/**
 * Generate Secret Key
 */
public static function generateSecret () {
  return random_bytes(256);
}

/**
 * Constructor
 * 
 * @param string $UserID ID of the User this Token authorises
 * @param string $Secret The secret key (temporary password)
 * @param int $Issued The date the Token was issued
 * @param int $Expiry The number of seconds the Token is valid for 
 */
public function __construct (
  string $UserID,
  string $Secret,
  int $Issued,
  ?int $Expiry = null
) {
  $this->UserID = $UserID;
  $this->Secret = $Secret;
  $this->Issued = $Issued;
  
  if (!is_null($Expiry)) {
    $this->Expiry = $Expiry;
  }
}
}