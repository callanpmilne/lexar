<?php

/**
 * Tool Class
 */
class Tool {
  /**
   * Tool Label
   * @param string
   */
  public string $Label;

  /**
   * Tool URI (relative to admin tools dir)
   * @param string
   */
  public string $Path;

  /**
   * A Web Tool
   * @param string $Label
   * @param string $Path
   */
  public function __construct(
    string $Label,
    string $Path
  ) {
    $this->Label = $Label;
    $this->Path = $Path;
  }
}
