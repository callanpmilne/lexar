<?php

/**
 * Entity Attribute
 */
class EntityAttribute {

  public const UUID_VALUE           = 'uuid';
  public const STRING_VALUE         = 'string';
  public const INTEGER_VALUE        = 'int';
  public const BOOL_VALUE           = 'bool';
  public const FLOAT_VALUE          = 'float';
  public const DEFAULT_VALUE_TYPE   = self::UUID_VALUE;

  /**
   * @var string UUID for the type
   */
  public string $ID;

  /**
   * @var string UUID for the Entity Type this Attribute belongs to
   */
  public string $EntityTypeID;

  /**
   * @var string UUID for the Entity Name to use for this Attribute
   */
  public string $EntityNameID;

  /**
   * @var string Type of value (e.g. 'string', 'int)
   */
  public string $ValueType = self::DEFAULT_VALUE_TYPE;

  /**
   * @var string The default value for this field
   */
  public string $DefaultValue = '';

  /**
   * @var bool TRUE if this attribute is NOT required (may be empty, null, or undefined)
   */
  public bool $Optional = false;

  /**
   * @var int Display Order
   */
  public int $DisplayOrder = 10;

  /**
   * Constructor Function
   * 
   * @param string $ID UUID for the type
   * @param string $EntityTypeID UUID for the Entity Type this Attribute belongs to
   * @param string $EntityNameID UUID for the Entity Name to use for this Attribute
   * @param string $ValueType Type of value (e.g. 'string', 'int)
   * @param string $DefaultValue TRUE if this attribute is NOT required (may be empty, null, or undefined)
   * @param bool $Optional The default value for this field
   * @param int $DisplayOrder Display Order
   */
  public function __construct (
    string $ID,
    string $EntityTypeID,
    string $EntityNameID,
    string $ValueType = self::DEFAULT_VALUE_TYPE,
    string $DefaultValue = '',
    bool $Optional = false,
    int $DisplayOrder = 10
  ) {
    $this->ID = $ID;
    $this->EntityTypeID = $EntityTypeID;
    $this->EntityNameID = $EntityNameID;
    $this->ValueType = $ValueType;
    $this->DefaultValue = $DefaultValue;
    $this->Optional = $Optional;
    $this->DisplayOrder = $DisplayOrder;
  }

}
