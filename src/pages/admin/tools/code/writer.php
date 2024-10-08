<?php

require_once('../src/class/Module.php');
require_once("../src/class/ModuleName.php");
require_once('../src/methods/Module/generateSourceFiles.php');

/**
 * Code Writer Page
 */

$isCodeWriterSubmit = 
  array_key_exists('is_code_writer_submit', $_REQUEST)
    && '1' === $_REQUEST['is_code_writer_submit'];

$sourceFiles = [];

$moduleName = null;
$module = null;

if ($isCodeWriterSubmit) {
  $userInput = $_REQUEST['userInput'] ? $_REQUEST['userInput'] : '';
  
  $moduleName = new LexarModuleName(
    $userInput,
  );

  $module = new LexarModule(
    $moduleName
  );

  $sourceFiles = generateSourceFiles(module: $module);
}

?>

<main>
  <div id="PageTitle">
    <h1>Module Builder</h1>
    <!-- <h1>Portal Builder</h1> -->

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <?php if ($isCodeWriterSubmit) : ?>
  <div
    class="component-form code-output-form"
    style="margin-bottom: 2rem;">
    <?php foreach ($sourceFiles as $uri => $src) : ?>
    <div 
      class="component-form-field">
      <label class="output">
        <pre><?=$uri?></pre>
      </label>

      <?=highlight_string(
        html_entity_decode($src), 
        true
      )?>
    </div>
    <?php endforeach; ?>
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
          type="input"
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
  div.component-form.code-output-form {
    max-width: none;
    width: 100%;
  }
  div.component-form.code-output-form div.component-form-field {
    margin-top: 0;
  }
  div.component-form.code-output-form div.component-form-field label.output > pre {
    margin: 0;
    padding: 0;
  }
  div.component-form.code-output-form div.component-form-field > pre {
    margin-top: 0;
  }
  div.component-form.code-output-form div.component-form-field label.output {
    backdrop-filter: drop-shadow(2px 4px 6px black);
    padding: 0.75rem;
    margin-top: 0;
    margin-bottom: 0;
    box-sizing: border-box;
  }
  div.component-form.code-output-form label {
    max-width: none;
    width: 100%;
  }
  div.component-form.code-output-form label {
    padding: 0;
    margin: 0;
  }
</style>

<script>
  (function ($w) {"use strict";
    const $el = ;

    const $els = $w.document.getElementsByClassName('component-form code-output-form').find();

    addEventListener('click', ($ev) => {
      if ($els.includes($ev.target)) return;
      $ev.preventDefault();
      $el.setSelectionRange(0,$el.value.length);
    });
  })(window);
</script>
