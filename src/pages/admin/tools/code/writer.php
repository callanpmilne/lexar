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
  var_dump($userInput);
  
  $moduleName = new LexarModuleName(
    $userInput,
  );
  var_dump($moduleName);
  $module = new LexarModule(
    $moduleName
  );

  $sourceFiles = generateSourceFiles(module: $module);

  foreach ($sourceFiles as $uri => $src) {
    ?>
    <h2><pre><?=$uri?></pre></h2>

    <?=highlight_string(
      html_entity_decode($src), 
      true
    )?>

    <?php
  }
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
    <?=var_dump($sourceFiles);?>
  <div
    class="component-form"
    style="margin-bottom: 2rem;">
    <div 
      class="component-form-field">
      <label
        for="SystemOutputCreatePage">
        Create <?=$_REQUEST['userInput']?> Page
      </label>

      <?=$sourceFiles[sprintf('src/common/form/create/%s.php', $module->name->LcSingular)]?>
    </div>

    <div 
      class="component-form-field">
      <label
        for="SystemOutputCreateForm">
        New <?=$_REQUEST['userInput']?> Form
      </label>

      <?=$sourceFiles[sprintf('src/common/form/create/%s.php', $module->name->LcSingular)]?>
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
