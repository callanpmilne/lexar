<?php

/**
 * Content Class
 */
abstract class Content {
  /**
   * @var string Unique ID
   */
  public string $ID;

  /**
   * @var string Author's User ID
   */
  public string $Author;
  
  /**
   * @var string Canonical URL to Content
   */
  public string $URL;

  /**
   * @var string Display Name
   */
  public string $Title;

  /**
  * @var string Full-Text Content
  */
  public string $Content;

  /**
   * @var int Length of the Content (in bytes)
   */
  public int $Length;

  /**
   * @var int Created Date as a unix timestamp
   */
  public int $Created;

  /**
   * @var int Published Date as a unix timestamp (not published if this is unset/empty)
   */
  public ?int $Published;

  /**
   * @var int Deleted Date as a unix timestamp (not deleted if this is unset/empty)
   */
  public ?int $Deleted;

  /**
   * Constructor
   * 
   * @param string $ID Unique ID
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
    string $Author,
    string $URL,
    string $Title,
    string $Content,
    int $Length,
    int $Created,
    ?int $Published = null,
    ?int $Deleted = null
  ) {
    $this->ID = $ID;
    $this->Author = $Author;
    $this->URL = $URL;
    $this->Title = $Title;
    $this->Content = $Content;
    $this->Length = $Length;
    $this->Created = $Created;
    
    if (!is_null($Published)) {
      $this->Published = $Published; // Date Content was Published  
    }
    
    if (!is_null($Deleted)) {
      $this->Deleted = $Deleted; // Date Content was Deleted/Unpublished
    }
  }

  /**
   * Get Type
   * 
   * Returns a description about the content (e.g. Image/800x600 or Video/800x600/5m22s)
   * 
   * @return string
   */
  public abstract function getType (
    // no args
  ): string;

  /**
   * Is Published
   * 
   * Determine if content is published or not.
   * 
   * @return boolean True if content is published
   */
  public function isPublished () {
    return isset($this->Published);
  }

} 