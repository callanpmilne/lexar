<?php
/**
 * Password Generator Page
 */

$isPasswordGeneratorSubmit = 
  array_key_exists('is_password_generator_submit', $_POST)
    && '1' === $_POST['is_password_generator_submit'];

if ($isPasswordGeneratorSubmit) {
  
}

?>

<main>
  <div id="PageTitle">
    <h1>Password Generator</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <?php if ($isPasswordGeneratorSubmit) : ?>
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
        readonly="readonly"><?=generatePassword(
          array_key_exists('length', $_REQUEST) ? $_REQUEST['length'] : 18,
          array_key_exists('use_phrases', $_REQUEST) && '1' == $_REQUEST['use_phrases'] ? true : false,
          array_key_exists('use_lc_letters', $_REQUEST) && '1' == $_REQUEST['use_lc_letters'] ? true : false,
          array_key_exists('use_uc_letters', $_REQUEST) && '1' == $_REQUEST['use_uc_letters'] ? true : false,
          array_key_exists('use_numbers', $_REQUEST) && '1' == $_REQUEST['use_numbers'] ? true : false,
          array_key_exists('use_special_chars', $_REQUEST) && '1' == $_REQUEST['use_special_chars'] ? true : false
        )?></textarea>
    </div>
  </div>
  <?php endif; ?>

  <form 
    action="/admin/tools/password/generator" 
    method="POST">
    <div
      class="component-form">
      <div 
        class="component-form-field">
        <label
          for="UsePhrasesCheckbox">
          <input
            id="UsePhrasesCheckbox"
            name="use_phrases"
            value="1"
            type="checkbox"
            <?=array_key_exists('use_phrases', $_REQUEST) && $_REQUEST['use_phrases'] ? 'checked=""' : ''?>
            tabindex="1"
            disabled="disabled" />
          
          Generate a passphrase
        </label>
      </div>

      <div 
        class="component-form-field">
        <label
          for="UseLowerLettersCheckbox">
          <input
            id="UseLowerLettersCheckbox"
            name="use_lc_letters"
            value="1"
            type="checkbox"
            <?=array_key_exists('use_lc_letters', $_REQUEST) && $_REQUEST['use_lc_letters'] ? 'checked=""' : ''?>
            tabindex="2" />
          
          Use Lower-Case Letters (a-z)
        </label>
      </div>

      <div 
        class="component-form-field">
        <label
          for="UseUpperLettersCheckbox">
          <input
            id="UseUpperLettersCheckbox"
            name="use_uc_letters"
            value="1"
            type="checkbox"
            <?=array_key_exists('use_uc_letters', $_REQUEST) && $_REQUEST['use_uc_letters'] ? 'checked=""' : ''?>
            tabindex="3" />
          
          Use Upper-Case Letters (A-Z)
        </label>
      </div>

      <div 
        class="component-form-field">
        <label
          for="UseNumbersCheckbox">
          <input
            id="UseNumbersCheckbox"
            name="use_numbers"
            value="1"
            type="checkbox"
            <?=array_key_exists('use_numbers', $_REQUEST) && $_REQUEST['use_numbers'] ? 'checked=""' : ''?>
            tabindex="4" />
          
          Use Numbers (0-9)
        </label>
      </div>

      <div 
        class="component-form-field">
        <label
          for="UseSpecialCharsCheckbox">
          <input
            id="UseSpecialCharsCheckbox"
            name="use_special_chars"
            value="1"
            type="checkbox"
            <?=array_key_exists('use_special_chars', $_REQUEST) && $_REQUEST['use_special_chars'] ? 'checked=""' : ''?>
            tabindex="5" />
          
          Use Special Characters (@#$%&!)
        </label>
      </div>

      <div 
        class="component-form-field">
        <label
          for="UserInputPassword">
          Length
        </label>

        <input 
          id="UserInputPassword"
          name="length"
          type="number"
          value="<?=array_key_exists('length', $_REQUEST) && $_REQUEST['length'] ? $_REQUEST['length'] : 18?>"
          tabindex="6" />
      </div>

      <div
        class="component-form-buttons">

        <div style="display: flex; flex: 1;"></div>

        <button
          type="submit"
          tabindex="7">
          Generate Password
        </button>

        <input
          name="is_password_generator_submit"
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

function generatePassword (
  int $length = 18,
  bool $use_phrases = true,
  bool $use_lc_letters = true,
  bool $use_uc_letters = true,
  bool $use_numbers = true,
  bool $use_special_chars = true
): string {
  $result = '';

  if ($use_phrases) {
    $result .= sprintf(
      '%s%s',
      getRandomDictionaryWord(),
      getRandomDictionaryWord()
    );

    $result .= '@#$%&!'[random_int(0, 5)];
  }

  $count = strlen($result)-1;
  for ($i = $count; $i < $length; $i++) {
    $result .= getRandomChar(
      $use_lc_letters,
      $use_uc_letters,
      $use_numbers,
      $use_special_chars
    );
  }

  return $result;
}

function getRandomChar (
  bool $use_lc_letters = true,
  bool $use_uc_letters = true,
  bool $use_numbers = true,
  bool $use_special_chars = true
): string {
  $pool = sprintf(
    '%s%s%s%s',
    $use_lc_letters ? 'abcdefghijklmnopqrstuvwxyz' : '',
    $use_uc_letters ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : '',
    $use_numbers ? '01234567890' : '',
    $use_special_chars ? '@#$%&!' : ''
  );

  $numChars = strlen($pool) - 1;
  $randomInt = random_int(0, $numChars);
  $randomChar = $pool[$randomInt];

  return $randomChar;
}

function getRandomDictionaryWord () {
  return [
    'Dictionary', 
    'Word', 
    'Random', 
    'Cute', 
    'Sexy'
  ][
    rand(0, 4)
  ];
}
