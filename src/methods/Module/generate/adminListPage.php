<?php

/**
 * Summary of generateAdminListPageSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateAdminListPageSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  ?>&lt;?php

/**
 * <?=$module->name->UcSingular?> List
 * 
 * Shows a list of <?=$module->name->UcPlural?>
 */

require_once('../src/class/<?=$module->name->UcSingular?>.php');
require_once('../src/methods/<?=$module->name->UcSingular?>/fetch<?=$module->name->UcSingular?>List.php');

$<?=$module->name->LcPlural?> = fetch<?=$module->name->UcSingular?>List();

?&gt;

&lt;main&gt;
  &lt;div id="PageTitle"&gt;
    &lt;h1&gt;<?=$module->name->UcSingular?> List&lt;/h1&gt;

    &lt;p class="breadcrumbs"&gt;
      &lt;a href="/admin"&gt;
        &larr; Admin Dashboard
      &lt;/a&gt;
    &lt;/p&gt;
  &lt;/div&gt;

  &lt;table&gt;
    &lt;thead&gt;
      &lt;tr&gt;
        &lt;th&gt;Name&lt;/th&gt;
        &lt;th&gt;Path&lt;/th&gt;
      &lt;/tr&gt;
    &lt;/thead&gt;

    &lt;tbody&gt;
      &lt;?php foreach ($<?=$module->name->LcPlural?> as $<?=$module->name->LcSingular?>) : ?&gt;
        &lt;tr&gt;
          &lt;td class="view-link"&gt;
            &lt;a href="/admin/view/<?=$module->name->LcSingular?>/&lt;?=$<?=$module->name->LcSingular?>-&gt;ID?&gt;"&gt;
              &lt;?=$<?=$module->name->LcSingular?>-&gt;Name?&gt;
            &lt;/a&gt;
          &lt;/td&gt;

          &lt;td&gt;
            /&lt;?=$<?=$module->name->LcSingular?>-&gt;Path?&gt;
          &lt;/td&gt;
        &lt;/tr&gt;
      &lt;?php endforeach; ?&gt;
    &lt;/tbody&gt;
  &lt;/table&gt;
&lt;/main&gt;<?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}
