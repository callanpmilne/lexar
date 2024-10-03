<p?php
/**
 * Timestamp Converter Page
 */
?>

<main>
  <div id="PageTitle">
    <h1>Timestamp Converter</h1>

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
      <p>Current Timestamp (in seconds)</p>
    </div>

    <div 
      class="component-form-field"
      style="align-items: center;">
      <input 
        id="TSOutput"
        type="text"
        value="<?=time()?>" />
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

  input#TSOutput {
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
    const $el = $w.document.getElementById('TSOutput');

    addEventListener('click', ($ev) => {
      if ($ev.target !== $el) return;
      $ev.preventDefault();
      $el.setSelectionRange(0,100);
    });
  })(window);
</script>
