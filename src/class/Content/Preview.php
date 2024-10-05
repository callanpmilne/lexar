<?php

/**
 * Preview Class
 */
class Preview {
  /**
   * @var string Unique ID
   */
  public string $ContentID;

  /**
   * @var array Source URI(s)
   */
  public array $Sources;

  /**
   * @var bool Preview is multiple frames?
   */
  public bool $Multiframe = false;

  /**
   * Constructor
   * 
   * @param string $ContentID Unique ID
   * @param array $Sources Source URI(s)
   * @param bool $Multiframe Display Name
   */
  public function __construct (
    string $ContentID,
    array $Sources,
    bool $Multiframe
  ) {
    $this->ContentID = $ContentID;
    $this->Sources = $Sources;
    $this->Multiframe = $Multiframe;
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