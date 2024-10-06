<?php

/**
 * Tool Class
 */
class Tool {
  /**
   * Tool Icon
   * @param string
   */
  public string $Icon;

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
   * @param string $Icon
   */
  public function __construct(
    string $Icon,
    string $Label,
    string $Path
  ) {
    $this->Icon = $Icon;
    $this->Label = $Label;
    $this->Path = $Path;
  }
}
