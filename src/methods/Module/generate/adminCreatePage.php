<?php

/**
 * Summary of generateAdminCreatePageSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateAdminCreatePageSourceFile (
  LexarModule $module
): string {
  if (!$module) {
    return '';
  }
  ob_start();
  
  ?>&lt;?php

require_once('../src/class/<?=$module->name->UcSingular?>.php');
require_once('../src/methods/<?=$module->name->UcSingular?>/create<?=$module->name->UcSingular?>.php');

/**
 * Create <?=$module->name->UcSingular?> Page
 */

$isCreate<?=$module->name->UcSingular?>Submit = 
  array_key_exists('is_create_<?=$module->name->LcSingular?>_submit', $_POST)
    && '1' === $_POST['is_create_<?=$module->name->LcSingular?>_submit'];

if ($isCreate<?=$module->name->UcSingular?>Submit) {
  
  // <?=$module->name->UcSingular?> ID
  $<?=$module->name->LcSingular?>ID = $_POST['uuid'];

  // <?=$module->name->UcSingular?> Name
  $<?=$module->name->LcSingular?>Name = $_POST['<?=$module->name->LcSingular?>Name'];

  // attempt to create <?=$module->name->LcSingular?>
  
  $result = create<?=$module->name->UcSingular?>(new <?=$module->name->UcSingular?>(
    $<?=$module->name->LcSingular?>ID,
    $<?=$module->name->LcSingular?>Name
  ));

  // redirect user to <?=$module->name->LcSingular?> admin page on successful creation
  if (true === $result) {
    ?&gt;
    &lt;script&gt;"use strict"; (function (w) {
      const <?=$module->name->LcSingular?>URI = '/admin/view/<?=$module->name->LcSingular?>/&lt;?=$<?=$module->name->LcSingular?>ID?&gt;';
      w.location.assign(<?=$module->name->LcSingular?>URI);
    })(window);&lt;/script&gt;
    &lt;?php
    exit(0);
  }

}
?&gt;

&lt;main&gt;
  &lt;div id="PageTitle"&gt;
    &lt;h1&gt;Create <?=$module->name->UcSingular?>&lt;/h1&gt;

    &lt;p class="breadcrumbs"&gt;
      &lt;a href="/admin"&gt;
        &larr; Admin Dashboard
      &lt;/a&gt;
    &lt;/p&gt;
  &lt;/div&gt;

  &lt;form 
    action="/admin/create/<?=$module->name->LcSingular?>" 
    method="POST"&gt;
    &lt;?php include('../src/common/form/create/<?=$module->name->LcSingular?>.php'); ?&gt;
  &lt;/form&gt;

  &lt;?php if ($isCreate<?=$module->name->UcSingular?>Submit) : ?&gt;
    &lt;div
      class="component-form-login-debug"&gt;
      &lt;h2&gt;Debug&lt;/h2&gt;
      &lt;pre&gt;&lt;?php var_dump($_POST); ?&gt;&lt;/pre&gt;
    &lt;/div&gt;
  &lt;?php endif; ?&gt;
&lt;/main&gt;

&lt;style&gt;
  div.component-form-login-debug {
    border: 1px solid;
    padding: 0 1rem 1rem;
    margin-bottom: 2rem;
  }
&lt;/style&gt;<?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}