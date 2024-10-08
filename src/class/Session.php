<?php

class Session {
  public string $ID;
  public ?string $UserID = null;
  public string $SecretKey;
  public int $Started;
  public ?int $Expiry = null;

  public static function generateSecretKey (): string {
    return sprintf(
      '%s/%s/%s',
      generateUuid(),
      uniqid(mt_rand(), true),
      generateUuid()
    );
  }

  public static function Create (string $ID) {
    $session = new Session(
      $ID,
      self::generateSecretKey(),
      time()
    );

    return $session;
  }

  public function __construct(
    string $ID,
    string $SecretKey,
    int $Started,
    ?string $UserID = null,
    ?int $Expiry = null
  ) {
    $this->ID = $ID;
    $this->UserID = $UserID;
    $this->SecretKey = $SecretKey;
    $this->Started = $Started;

    if (!is_null($Expiry)) {
      $this->Expiry = $Expiry;
    }

    if (!is_null($UserID)) {
      $this->UserID = $UserID;
    }
  }

  public function isLoggedIn (): bool {
    return $this->isNotExpired()
      && !is_null($this->UserID);
  }

  public function isNotExpired (): bool {
    return is_null($this->Expiry)
      || time() < time() + $this->Expiry;
  }
}
