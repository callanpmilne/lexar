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
   * Constructor
   * 
   * @param string $ContentID Unique ID
   * @param array $Sources Source URI(s)
   */
  public function __construct (
    string $ContentID,
    array $Sources
  ) {
    $this->ContentID = $ContentID;
    $this->Sources = $Sources;
  }

  /**
   * Is Multi-Frame
   * 
   * Determine if preview has multiple frames.
   * 
   * @return boolean True if content has multiple frames
   */
  public function isMultiframe () {
    return array_count_values($this->Sources) > 1;
  }

} 