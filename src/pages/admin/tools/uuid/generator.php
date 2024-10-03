<?php
/**
 * UUID Generator Page
 */
?>

<main>
  <div id="PageTitle">
    <h1>UUID Generator</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <div 
    class="component-form">
    <div 
      class="component-form-field"
      style="align-items: center;">
      <input 
        id="UUIDOutput"
        type="text"
        value="<?=generateUuid()?>" />
    </div>
  </div>
</main>

<style>
  main {
    align-items: center;
  }
  
  main div.component-form {
    padding-left: 1rem;
    padding-right: 1rem;
  }

  input#UUIDOutput {
    font-family: monospace;
    font-size: 1.1rem;
    line-height: 1;
    padding: 1rem;
    background: transparent;
    box-shadow: none;
    border: none;
    color: #fff;
    width: 24rem;
    text-align: center;
  }
</style>

<script>
  (function ($w) {"use strict";
    const $el = $w.document.getElementById('UUIDOutput');

    addEventListener('click', ($ev) => {
      if ($ev.target !== $el) return;
      $ev.preventDefault();
      $el.setSelectionRange(0,100);
    });
  })(window);
</script>
