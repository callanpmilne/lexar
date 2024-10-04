<?php

require_once('../src/class/UserHash.php');

require_once("../src/methods/generateUuid.php");
require_once("../src/methods/User/fetchUser.php");
require_once("../src/methods/User/fetchUserHash.php");
require_once("../src/methods/Session/createSession.php");
require_once("../src/methods/Session/fetchSession.php");
require_once("../src/methods/Session/updateSession.php");

/**
 * Start Session
 */
$GLOBALS['sess'] = null;
$GLOBALS['sess'] = GlobalSession::getGlobalSession();

/**
 * Summary of SessionException
 */
class SessionException extends Exception {
  /**
   * Summary of __construct
   * @param mixed $message
   * @param mixed $code
   * @param Throwable $previous
   */
  public function __construct($message = "", $code = 0, ?Throwable $previous = null) {
    parent::__construct($message, $code, $previous);
  }
}

/**
 * Summary of SessionInitException
 */
class SessionInitException extends Exception {
  /**
   * Summary of __construct
   * @param mixed $message
   * @param mixed $code
   * @param Throwable $previous
   */
  public function __construct($message = "", $code = 0, ?Throwable $previous = null) {
    parent::__construct($message, $code, $previous);
  }
}

/**
 * Global Session 
 */
class GlobalSession {
  /**
   * Summary of COOKIE_NAME
   * @var string Name of the Cookie that stores the SessionID
   */
  protected const COOKIE_NAME = 'sid';

  /**
   * Summary of COOKIE_DEFAULT_EXP
   * @var int Default Cookie Expiry Time (in seconds)
   */
  protected const COOKIE_DEFAULT_EXP = 900;

  /**
   * Summary of Session
   * @var Session
   */
  private Session $Session;

  /**
   * Summary of User
   * @var User
   */
  private ?User $User = null;

  /**
   * Summary of getGlobalSession
   * 
   * @return GlobalSession
   */
  public static function getGlobalSession (): GlobalSession {
    if (array_key_exists('sess', $GLOBALS) && !is_null($GLOBALS['sess'])) {
      return $GLOBALS['sess'];
    }

    $sid = array_key_exists("sid", $GLOBALS) ? $GLOBALS["sid"] : self::readCookie();

    if (!$sid || $sid === "") {
      $sid = self::initSession();
    }
    
    $session = fetchSessionByID($sid);

    $globalSession = new GlobalSession(
      $session
    );
    
    $GLOBALS["sess"] = $globalSession;

    // Renew the cookie
    GlobalSession::storeCookie($sid);

    try {
      if (!$session->isLoggedIn()) {
        return $globalSession;
      }

      $user = fetchUserByID($session->UserID);

      $globalSession->setUser($user);
    }
    catch (Exception $e) {
      throw new SessionException(
        'Failed to load user',
        0,
        $e
      );
    }

    return $globalSession;
  }
  
  /**
   * Summary of initSession
   * 
   * @return string
   */
  private static function initSession (): string {
    $sid = generateUuid();
    $session = Session::Create($sid);

    $GLOBALS["sid"] = $sid;
    
    try {
      createSession($session);
    }
    catch (Exception $e) {
      // Handle session creation error 
      throw new SessionInitException(
        'Failed to create session',
        0,
        $e
      );
    }
    
    try {
      self::storeCookie($sid);
    }
    catch (Exception $e) {
      // handle cookie storage error
      throw new SessionInitException(
        'Failed to store session cookie',
        0,
        $e
      );
    }

    return $sid;
  }

  /**
   * Summary of readCookie
   * 
   * @return string
   */
  private static function readCookie (): string {
    if (!array_key_exists(self::COOKIE_NAME, $_COOKIE)) {
      return '';
    }

    return $_COOKIE[self::COOKIE_NAME];
  }

  /**
   * Summary of storeCookie
   * 
   * @param string $newValue
   * @return void
   */
  private static function storeCookie (
    string $newValue,
    ?int $expires = null
  ) {
    setcookie(
      self::COOKIE_NAME,
      $newValue,
      !is_null($expires) ? $expires : time() + self::COOKIE_DEFAULT_EXP,
      "/",
      explode(":", $_SERVER['HTTP_HOST'])[0],
      false,
      false
    );
  }

  /**
   * Expire Cookie
   * @return void
   */
  public static function expireCookie() {
    $oneSecondAgo = time() - 1;
    self::storeCookie(self::readCookie(), $oneSecondAgo);
  }
  
  /**
   * Summary of authSession
   * 
   * @param AuthAttempt $authAttempt
   * @return void
   */
  public static function authSession (
    AuthAttempt $authAttempt
  ): User {
    try {
      // attempt authentication
      $user = fetchUserByUsername($authAttempt->getUsername());
    }
    catch (Exception $e) {
      throw new SessionException('Invalid Authentication');
    }
  
    // Fetch most recent Password UserHash
    $userHash = fetchLastUserHash(
      $user->ID,
      UserHash::$PASSWORD_TYPE
    );
  
    // Verify input password matches most recent Password UserHash
    $verified = $userHash->verify($authAttempt->getPassword());

    if (!$verified) {
      throw new SessionException('Invalid Authentication');
    }

    $globalSession = $GLOBALS["sess"];
    $globalSession->setUser($user);

    updateSessionSetUserID(
      $globalSession->getSession()->ID, 
      $globalSession->getUser()->ID
    );
  
    return $user;
  }

  /**
   * Summary of __construct
   * 
   * @param Session $Session
   */
  public function __construct(
    Session $Session
  ) {
    $this->Session = $Session;
  }

  /**
   * Get User ID
   * 
   * This will *always* return an ID, even if the current user is not logged in.
   * If the current user is not logged in: this function will use the `DEFAULT_USER_UUID` 
   * const defined in config.inc.php
   */
  public function getUserID (
    // no args
  ): string {
    if (is_null($this->User)) {
      return DEFAULT_USER_UUID;
    }

    return $this->getUser()->ID;
  }

  /**
   * Summary of setUser
   * @param User $user
   * @return $this
   */
  public function setUser (
    User $user
  ) {
    $this->User = $user;
    return $this;
  }

  /**
   * Summary of getUser
   * @return User
   */
  public function getUser (): User {
    if (is_null($this->User)) {
      throw new Exception('No user logged in');
    }
    return $this->User;
  }

  /**
   * Summary of getSession
   * @return Session
   */
  public function getSession (): Session {
    return $this->Session;
  }

  /**
   * End Session
   * @return void
   */
  public function end (): void {
    // Clear the current user
    // $this->setUser(null);

    // expire session entry in db
    // ...

    // Expire the cookie containing our session ID
    GlobalSession::expireCookie();
  }
}

