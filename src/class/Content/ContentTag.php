<?php

/**
 * Content Tag Class
 */
class ContentTags {
  /**
   * @var string $ContentID ID of the content item
   */
  public string $ContentID;

  /**
   * @var string $TagID ID of the Group/Tag/Category/Phrase
   */
  public string $TagID;

  /**
   * Constructor
   * 
   * @param string $ContentID Unique ID
   * @param string $TagID Author's User ID
   */
  public function __construct (
    string $ContentID,
    string $TagID
  ) {
    $this->ContentID = $ContentID;
    $this->TagID = $TagID;
  }
} 