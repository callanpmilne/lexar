<?php

require_once("../src/class/Content/VisualContent.php");

/**
 * Video Class
 */
abstract class MultiframeContent extends VisualContent {
  /**
   * @var int Duration in milliseconods
   */
  public int $Duration;

  /**
   * @var int Frames Per Second
   */
  public int $FPS;

  /**
   * Constructor
   * 
   * @param string $ID Unique ID
   * @param string $Author Author's User ID
   * @param string $URL Display Name
   * @param string $Title Path (e.g. animals/cat)
   * @param string $Content
   * @param int $Duration Content duration in milliseconds
   * @param int $FPS Frames Per Seconod
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
    int $Quality,
    int $Height,
    int $Width,
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
      $Quality,
      $Height,
      $Width,
      $Length,
      $Created,
      $Published ? $Published : null,
      $Deleted ? $Deleted : null
    );

    $this->Duration = $Duration;
    $this->FPS = $FPS;
  }

  public function getType (
    // no args
  ): string {
    return "VIDEO";
  }
} 