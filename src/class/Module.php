<?php

/**
 * LexarModule
 * 
 * A LexarModule can be used to scaffold new modules for Lexar
 * 
 * ```php
 * <?php
 *   $moduleName = new LexarModuleName(
 *     'Categories',
 *     'categories',
 *     'Category',
 *     'category'
 *   );
 * 
 *   $module = new LexarModule(
 *     $moduleName
 *   );
 * 
 *   $sourceFiles = generateSourceFiles($module);
 *   
 *   print $sourceFiles['src/class/Customer.php'];
 * ?>
 * ```
 * 
 * @param string 
 */
class LexarModule {
  /**
   * @var LexarModuleName Name of the module
   */
  public LexarModuleName $name;

  /**
   * Lexar Module
   * 
   * @param LexarModuleName $moduleName The Module Name 
   */
  public function __construct (
    LexarModuleName $name
  ) {
    $this->name = $name;
  }

}

class LexarModuleName {

  /**
   * @var string Upper-Case Plural Representation
   */
  public string $UcPlural;

  /**
   * @var string Upper-Case Singular Representation
   */
  public string $UcSingular;

  /**
   * @var string Lower-Case Plural Representation
   */
  public string $LcPlural;

  /**
   * @var string Lower-Case Singular Representation
   */
  public string $LcSingular;

  /**
   * Lexar Module Name
   */
  public function __construct(
    string $UcPlural,
    string $UcSingular = '',
    string $LcPlural = '',
    string $LcSingular = ''
  ) {
    
    $this->UcSingular = '' === $UcSingular 
      ? self::singularize($UcPlural) : $UcSingular;
    
    $this->LcPlural = '' === $LcPlural 
      ? self::lowerFirst($UcPlural) : $LcPlural;
  
    $this->LcSingular = '' === $LcSingular
      ? self::lowerFirst($UcSingular) : $LcSingular;
  }

  /**
   * Singularize
   * 
   * Convert a plural word (e.g. Cows) to it's singular representation (e.g. Cow)
   * 
   * Examples:
   * - Cows => Cow
   * - Categories => Category
   * - mice => mice 
   */
  public static function singularize (
    string $input
  ): string {
    $plural = preg_match('/s$/i', $input);
    if (!$plural) {
      return $input;
    }

    $ies = preg_match('/ies$/i', $input);
    if ($ies) {
      return sprintf(
        '%s%s',
        substr($input, -3),
        'y'
      );
    }

    return substr($input, 0, -1);
  }

  /**
   * Lower First Letter
   * 
   * Change a string so it's first letter is lower-case.
   * 
   * @param string $input Input string
   * @return string input string with lower-case first letter
   */
  public static function lowerFirst (
    string $input
  ): string {
    $firstLetter = substr($input, 0, 1);
    $lcFirstLetter = strtolower($firstLetter);
    $remainingLetters = substr($input, 1);

    return sprintf(
      '%s%s',
      $lcFirstLetter,
      $remainingLetters
    );
  }
}
