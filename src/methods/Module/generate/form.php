<?php

require_once("../src/class/Module.php");

/**
 * Summary of generateFormSourceFile
 * @param LexarModule $module
 * @return string
 */
function generateFormSourceFile (
  LexarModule $module
): string {
  ob_start();
  
  ?>&lt;?php

/**
 * Create <?=$module->name->UcSingular?> Form Component
 */

include('../src/common/form/input/uuid.php');

?&gt;

&lt;div 
  class="component-form"&gt;

  &lt;?=uuidField('<?=$module->name->UcSingular?> ID')?&gt; 

  &lt;div 
    class="component-form-field"&gt;
    &lt;label
      for="Create<?=$module->name->UcSingular?>InputName"&gt;
      <?=$module->name->UcSingular?> Name
    &lt;/label&gt;

    &lt;input 
      id="Create<?=$module->name->UcSingular?>InputName"
      name="<?=$module->name->LcSingular?>Name"
      type="input"
      tabindex="2" /&gt;
  &lt;/div&gt;

  &lt;div
    class="component-form-buttons"&gt;

    &lt;div style="display: flex; flex: 1;"&gt;&lt;/div&gt;

    &lt;button
      type="submit"&gt;
      Create
    &lt;/button&gt;

    &lt;input
      name="is_create_<?=$module->name->LcSingular?>_submit"
      type="hidden"
      value="1" /&gt;
  &lt;/div&gt;
&lt;/div&gt;

&lt;style&gt;
  main {
    align-items: center;
  }
&lt;/style&gt;<?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}