<?php

require_once("../src/class/Content/VisualContent.php");

/**
 * Photo Class
 */
final class Photo extends VisualContent {
  /**
   * Constructor
   * 
   * @param string $ID Unique ID
   * @param string $Author Author's User ID
   * @param string $URL Display Name
   * @param string $Title Path (e.g. animals/cat)
   * @param string $Content
   * @param int $Quality Quality score out of 100
   * @param int $Height Height in pixels
   * @param int $Width Width in pixels
   * @param int $Length Content Length in bytes
   * @param int $Created Date created
   * @param ?int $Published Date published
   * @param ?int $Deleted Date deleted
   */
  public function __construct (
    string $ID,
    string $Author,
    string $URL,
    string $Title,
    string $Content,
    int $Duration,
    int $FPS,
    int $Length,
    int $Created,
    ?int $Published = null,
    ?int $Deleted = null
  ) {
    parent::__construct(
      $ID,
      $Author,
      $URL,
      $Title,
      $Content,
      $Duration,
      $FPS,
      $Length,
      $Created,
      $Published ? $Published : null,
      $Deleted ? $Deleted : null
    );
  }

  public function getType (
    // no args
  ): string {
    return "PHOTO";
  }
} 