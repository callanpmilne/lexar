<?php

require_once("../src/class/Content/TextContent.php");

/**
 * Comment Class
 */
final class Comment extends TextContent {
  /**
   * @var string Parent ID
   */
  public string $ParentID;

  /**
   * Constructor
   * 
   * @param string $ID Unique ID
   * @param string $ParentID ID of the Content this Comment belongs to
   * @param string $Author Author's User ID
   * @param string $URL Display Name
   * @param string $Title Path (e.g. animals/cat)
   * @param string $Content
   * @param int $Length Content Length in bytes
   * @param int $Created Date created
   * @param ?int $Published Date published
   * @param ?int $Deleted Date deleted
   */
  public function __construct (
    string $ID,
    string $ParentID,
    string $Author,
    string $URL,
    string $Title,
    string $Content,
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
      $Length,
      $Created,
      $Published ? $Published : null,
      $Deleted ? $Deleted : null
    );

    $this->ParentID = $ParentID;
  }

  public function getType (
    // no args
  ): string {
    return "COMMENT";
  }
} 