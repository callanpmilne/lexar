<?php

/**
 * Summary of EntityName
 */
class EntityName {

  /**
   * @var string $ID The Universally Unique ID (UUID) for the entity name
   */
  public string $ID;

  /**
   * @var string $Label Entity Name to use when being presented in UIs
   */
  public string $Label;

  /**
   * @var string $NiceName Entity Name to use where nicename is required
   */
  public string $NiceName;

  /**
   * @var string $PascalCaseName Entity Name to use where PascalCase is required
   */
  public string $PascalCaseName;

  /**
   * @var string $CamelCaseName Entity Name to use where camelCase is required
   */
  public string $CamelCaseName;

  /**
   * @var string $SnakeCaseName Entity Name to use where snake_case is required
   */
  public string $SnakeCaseName;

  /**
   * @var string $PluralReplacements Replacement rules (separated with a single comma ',') having
   *                                 each rule defined in the format {regexp}={string_replacement}
   */
  public string $PluralReplacements;

  /**
   * Constructor Function
   * 
   * @param string $ID Universally Unique ID (UUID) for the type
   * @param string $Label Label
   * @param string $NiceName nicename
   * @param string $PascalCaseName PascalCase Name
   * @param string $CamelCaseName camelCase Name
   * @param string $SnakeCaseName snake_case Name
   * @param ?string $PluralReplacements Replacement rules
   */
  public function __construct (
    string $ID,
    string $Label,
    string $NiceName,
    string $PascalCaseName,
    string $CamelCaseName,
    string $SnakeCaseName,
    string $PluralReplacements
  ) {
    $this->ID = $ID;
    $this->Label = $Label;
    $this->NiceName = $NiceName;
    $this->PascalCaseName = $PascalCaseName;
    $this->CamelCaseName = $CamelCaseName;
    $this->SnakeCaseName = $SnakeCaseName;
    $this->PluralReplacements = $PluralReplacements;
  }

}
