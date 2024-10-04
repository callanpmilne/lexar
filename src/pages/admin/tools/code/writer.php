<?php
/**
 * Code Writer Page
 */

$isCodeWriterSubmit = 
  array_key_exists('is_code_writer_submit', $_POST)
    && '1' === $_POST['is_code_writer_submit'];

if ($isCodeWriterSubmit) {
 
}

?>

<main>
  <div id="PageTitle">
    <h1>Code Writer</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <?php if ($isCodeWriterSubmit) : ?>
  <div
    class="component-form alt-form"
    style="margin-bottom: 2rem;">
    <div 
      class="component-form-field">
      <label
        for="SystemOutputCreatePage">
        Create <?=$_REQUEST['userInput']?> Page
      </label>

      <?=highlight_string(
        html_entity_decode(
          createPageSource($_REQUEST['userInput'])
        ), 
      true)?>
    </div>

    <div 
      class="component-form-field">
      <label
        for="SystemOutputCreateForm">
        New <?=$_REQUEST['userInput']?> Form
      </label>

      <?=highlight_string(
        html_entity_decode(
          createFormSource($_REQUEST['userInput'])
        ), 
      true)?>
    </div>
  </div>
  <?php endif; ?>

  <form 
    action="/admin/tools/code/writer" 
    method="POST">
    <div
      class="component-form">
      <div 
        class="component-form-field">
        <label
          for="UserInputObjectName">
          Object Name
        </label>

        <input 
          id="UserInputObjectName"
          name="userInput"
          type="text"
          tabindex="1" />
      </div>

      <div
        class="component-form-buttons">

        <div style="display: flex; flex: 1;"></div>

        <button
          type="submit">
          Generate Code
        </button>

        <input
          name="is_code_writer_submit"
          type="hidden"
          value="1" />
      </div>
    </div>
  </form>
</main>

<style>
  textarea#SystemOutputHash {
    /* font-family: monospace;
    font-size: 1.1rem;
    line-height: 1;
    padding: 1rem;
    background: transparent;
    box-shadow: none;
    border: none;
    color: #fff;
    width: 24rem;
    text-align: center; */
    width: 100%;
    height: 14rem;
    background: rgba(0,0,0,0.25);
    border-width: 1px 0;
    border-style: solid;
    border-color: rgba(255,255,255,0.5);
    box-sizing: border-box;
    color: rgba(255,255,255,0.8);
    padding: 0.5rem 1rem;
    line-height: 1.25;
    height: 4.2rem;
  }
  textarea#SystemOutputHash:focus {
    outline-color: #fff;
  }
</style>

<script>
  (function ($w) {"use strict";
    const $el = $w.document.getElementById('SystemOutputHash');

    addEventListener('click', ($ev) => {
      if ($ev.target !== $el) return;
      $ev.preventDefault();
      $el.setSelectionRange(0,$el.value.length);
    });
  })(window);
</script>

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

include('../src/components/forms/input/uuid.php');

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

function createPageSource (
  string $objectName
): string {
  $firstLetter = substr($objectName, 0, 1);

  $x = [
    'CapitalObjectName' => $objectName,
    'NotCapitalObjectName' => strtolower($firstLetter) . substr($objectName, 1),
  ];

  ob_start();

  ?>&lt;?php

require_once('../src/class/<?=$x['CapitalObjectName']?>.php');
require_once('../src/methods/<?=$x['CapitalObjectName']?>/create<?=$x['CapitalObjectName']?>.php');

/**
 * Create <?=$x['CapitalObjectName']?> Page
 */

$isCreate<?=$x['CapitalObjectName']?>Submit = 
  array_key_exists('is_create_<?=$x['NotCapitalObjectName']?>_submit', $_POST)
    && '1' === $_POST['is_create_<?=$x['NotCapitalObjectName']?>_submit'];

if ($isCreate<?=$x['CapitalObjectName']?>Submit) {
  
  // <?=$x['CapitalObjectName']?> ID
  $<?=$x['NotCapitalObjectName']?>ID = $_POST['uuid'];

  // <?=$x['CapitalObjectName']?> Name
  $<?=$x['NotCapitalObjectName']?>Name = $_POST['<?=$x['NotCapitalObjectName']?>Name'];

  // attempt to create <?=$x['NotCapitalObjectName']?>
  
  $result = create<?=$x['CapitalObjectName']?>(new <?=$x['CapitalObjectName']?>(
    $<?=$x['NotCapitalObjectName']?>ID,
    $<?=$x['NotCapitalObjectName']?>Name
  ));

  // redirect user to <?=$x['NotCapitalObjectName']?> admin page on successful creation
  if (true === $result) {
    ?&gt;
    &lt;script&gt;"use strict"; (function (w) {
      const <?=$x['NotCapitalObjectName']?>URI = '/admin/view/<?=$x['NotCapitalObjectName']?>/&lt;?=$<?=$x['NotCapitalObjectName']?>ID?&gt;';
      w.location.assign(<?=$x['NotCapitalObjectName']?>URI);
    })(window);&lt;/script&gt;
    &lt;?php
    exit(1);
  }

}
?&gt;

&lt;main&gt;
  &lt;div id="PageTitle"&gt;
    &lt;h1&gt;Create <?=$x['CapitalObjectName']?>&lt;/h1&gt;

    &lt;p class="breadcrumbs"&gt;
      &lt;a href="/admin"&gt;
        &larr; Admin Dashboard
      &lt;/a&gt;
    &lt;/p&gt;
  &lt;/div&gt;

  &lt;form 
    action="/admin/create/<?=$x['NotCapitalObjectName']?>" 
    method="POST"&gt;
    &lt;?php include('../src/components/forms/create/<?=$x['NotCapitalObjectName']?>.php'); ?&gt;
  &lt;/form&gt;

  &lt;?php if ($isCreate<?=$x['CapitalObjectName']?>Submit) : ?&gt;
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
&lt;/style&gt;
  <?php

  $result = ob_get_contents();

  ob_clean();

  return $result;
}
