<?php

class EntityAttributeValue {

  /**
   * @var string $Entity Entity UUID
   */
  public string $Entity;

  /**
   * @var string $EntityAttributeID Entity UUID
   */
  public string $EntityAttributeID;

  /**
   * @var string|null $Value Entity Type UUID
   */
  public string|null $Value;

  /**
   * @var string $LastModified Entity Type UUID
   */
  public string $LastModified;

  /**
   * Constructor
   * 
   * @param string $ID Entity UUID
   * @param string $EntityAttributeID Entity Attribute UUID
   * @param string|null $Value Entity Attribute Value
   * @param string $LastModified Entity Type UUID
   */
  public function __construct(
    string $ID,
    string $EntityAttributeID,
    string|null $Value = NULL,
    ?int $LastModified = 0
  ) {
    $this->ID = $ID;
    $this->EntityAttributeID = $EntityAttributeID;
    $this->Value = $Value;
    $this->LastModified = !$LastModified ? time() : $LastModified;
  }

}