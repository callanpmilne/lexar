<?php

require_once("../src/class/Module.php");

require_once("../src/methods/Module/generate/adminCreatePage.php");
require_once("../src/methods/Module/generate/adminListPage.php");
require_once("../src/methods/Module/generate/adminViewPage.php");
require_once("../src/methods/Module/generate/class.php");
require_once("../src/methods/Module/generate/dbCreate.php");
require_once("../src/methods/Module/generate/dbFetch.php");
require_once("../src/methods/Module/generate/dbFetchList.php");
require_once("../src/methods/Module/generate/dbSchema.php");
require_once("../src/methods/Module/generate/detailedClass.php");
require_once("../src/methods/Module/generate/form.php");

/**
 * Generate Source Files
 * 
 * Generate source files for a Lexar Module based on the configuration in
 * $module param.
 * 
 * @param LexarModule $module
 * @return array Key=>Value pairs where `Key` is the source file path and `Value` is the 
 *               source code
 */
function generateSourceFiles (
  LexarModule $module
) {
  $ucSingular = $module->name->UcSingular;
  $ucPlural = $module->name->UcPlural;
  $lcSingular = $module->name->LcSingular;
  $lcPlural = $module->name->LcPlural;

  return [
    sprintf( // src/class/Category.php
      '%s%s.php',
      'src/class/',
      $ucSingular
    ) => generateClassSourceFile($module),

    sprintf( // src/class/DetailedCategory.php
      '%s%s.php',
      'src/class/Detailed', 
      $ucSingular
    ) => generateDetailedClassSourceFile($module),

    sprintf( // src/common/form/create/category.php
      '%s%s.php',
      'src/common/form/create/',
      $lcSingular
    ) => generateFormSourceFile($module),
    
    sprintf( // src/methods/Category/createCategory.php
      '%s%s%s%s.php',
      'src/methods/',
      $ucSingular,
      '/create',
      $ucSingular
    ) => generateDBCreateSourceFile($module),

    sprintf( // src/methods/Category/fetchCategory.php
      '%s%s%s%s.php', 
      'src/methods/', 
      $ucSingular, 
      '/fetch', 
      $ucSingular
    ) => generateDBFetchSourceFile($module),

    sprintf( // src/methods/Category/fetchCategoryList.php
      '%s%s%s%s%s.php', 
      'src/methods/', 
      $ucSingular, 
      '/fetch', 
      $ucSingular,
      'List'
    ) => generateDBFetchListSourceFile($module),

    sprintf( // src/pages/admin/create/customer.php
      "%s%s.php", 
      'src/pages/admin/create/', 
      $lcSingular
    ) => generateAdminCreatePageSourceFile($module),

    sprintf( // src/pages/admin/list/customers.php
      '%s%s.php', 
      'src/pages/admin/list/', 
      $lcPlural
    ) => generateAdminListPageSourceFile($module),

    sprintf( // src/pages/admin/view/customer.php
      '%s%s.php', 
      'src/pages/admin/view/', 
      $lcSingular
    ) => generateAdminViewPageSourceFile($module),

    sprintf( // db/schema/Customer.sql
      '%s%s.sql', 
      'db/schema/', 
      $ucSingular
    ) => generateDBSchemaSourceFile($module),
  ];
}
