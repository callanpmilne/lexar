<?php

require_once("../src/class/ModuleName.php");

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
