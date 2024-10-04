<?php

function createFormSource (
  string $objectName
): string {
  $firstLetter = substr($objectName, 0, 1);

  $x = [
    'CapitalObjectName' => $objectName,
    'NotCapitalObjectName' => strtolower($firstLetter) . substr($objectName, 1),
  ];

  ob_start();

  ?>&lt;?php

/**
* Create <?=$x['CapitalObjectName']?> Form Component
*/

include('../src/common/form/input/uuid.php');

?&gt;

&lt;div 
  class="component-form"&gt;

  &lt;?=uuidField('<?=$x['CapitalObjectName']?> ID')?&gt; 

  &lt;div 
    class="component-form-field"&gt;
    &lt;label
      for="Create<?=$x['CapitalObjectName']?>InputName"&gt;
      <?=$x['CapitalObjectName']?> Name
    &lt;/label&gt;

    &lt;input 
      id="Create<?=$x['CapitalObjectName']?>InputName"
      name="<?=$x['NotCapitalObjectName']?>Name"
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
      name="is_create_<?=$x['NotCapitalObjectName']?>_submit"
      type="hidden"
      value="1" /&gt;
  &lt;/div&gt;
&lt;/div&gt;

&lt;style&gt;
  main {
    align-items: center;
  }
&lt;/style&gt;
  <?php
  $result = ob_get_contents();

  ob_clean();

  return $result;
}