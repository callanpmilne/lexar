<?php

/**
 * Summary of generateAdminViewPageSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateAdminViewPageSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  ?>&lt;?php
/**
 * Admin View <?=$module->name->UcSingular?> Page
 */
  <?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}
