<?php
/**
 * Password Hasher Page
 */

$isPasswordHasherSubmit = 
  array_key_exists('is_password_hasher_submit', $_POST)
    && '1' === $_POST['is_password_hasher_submit'];

if ($isPasswordHasherSubmit) {
 
}

?>

<main>
  <div id="PageTitle">
    <h1>Password Hasher</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <?php if ($isPasswordHasherSubmit) : ?>
  <div
    class="component-form"
    style="margin-bottom: 2rem;">
    <div 
      class="component-form-field">
      <label
        for="SystemOutputHash">
        Result
      </label>

      <textarea 
        id="SystemOutputHash"
        name="systemOutput"
        type="input"
        tabindex="1"
        readonly="readonly"><?=hashPassword($_REQUEST['userInput'])?></textarea>
    </div>
  </div>
  <?php endif; ?>

  <form 
    action="/admin/tools/password/hasher" 
    method="POST">
    <div
      class="component-form">
      <div 
        class="component-form-field">
        <label
          for="UserInputPassword">
          Password
        </label>

        <input 
          id="UserInputPassword"
          name="userInput"
          type="password"
          tabindex="2" />
      </div>

      <div
        class="component-form-buttons">

        <div style="display: flex; flex: 1;"></div>

        <button
          type="submit">
          Hash Password
        </button>

        <input
          name="is_password_hasher_submit"
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
      $el.setSelectionRange(0,255);
    });
  })(window);
</script>

<?php

function hashPassword (
  string $input
): string {
  return password_hash(
    $input, 
    PASSWORD_ARGON2ID, 
    array(
      'memory_cost' => 20000, 
      'time_cost' => 4, 
      'threads' => 4
    )
  );
}
