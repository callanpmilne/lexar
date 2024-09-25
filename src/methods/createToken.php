<?php

/**
 * Create Token 
 */
function createToken (
  AuthAttempt $auth
) {
  
  try {
    $user = fetchUserByLogin($auth->getInputName());
    $correctPassword = $user->pwMatch($auth->getPassword());

    if (true !== $correctPassword) {
      throw new UserInputException('Invalid Password');
    }

    $token = AuthToken::generate($user);

    insertToken($token);

    return $token;
  }
  catch (Exception $e) {
    return null;
  }

}

/**
 * Fetch User By Login (Username)
 * 
 * @param string $Username
 * @return array User Data
 */
function fetchUserByLogin (
  string $Username
) {
  
  $sth = $dbh->prepare('SELECT ID, 
    FROM `Users`
    WHERE `Username` = STRTOLOWER(?)');
  
  $sth->bindParam(1, $Username, PDO::PARAM_STR, 256);
  
  $sth->execute();

  return $sth->fetch(PDO::FETCH_ASSOC);
}

/**
 * Insert Token
 * 
 * @param AuthToken $token
 */
function insertToken (
  AuthToken $token
) {

  $sth = $dbh->prepare('INSERT
    INTO 
      `AuthTokens` (
        `UserID`, 
        `Secret`, 
        `Issued`, 
        `Expiry`
      ) 
    VALUES 
      (
        ?, 
        ?, 
        ?, 
        ?
      )');
  
  $sth->bindParam(1, $token->UserID, PDO::PARAM_STR, 128);
  $sth->bindParam(2, $token->Secret, PDO::PARAM_STR, 256);
  $sth->bindParam(2, $token->Issued, PDO::PARAM_INT);
  $sth->bindParam(2, $token->Expiry, PDO::PARAM_INT);

  $sth->execute();

}
