<?php

class Entity {

  /**
   * @var string $ID Entity UUID
   */
  public string $ID;

  /**
   * @var string $TypeID Entity Type UUID
   */
  public string $TypeID;

  /**
   * Constructor
   * 
   * @param string $ID Entity UUID
   * @param string $TypeID Entity Type UUID
   */
  public function __construct(
    string $ID,
    string $TypeID
  ) {
    $this->ID = $ID;
    $this->TypeID = $TypeID;
  }

}