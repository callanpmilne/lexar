<?php

require_once('../src/methods/generateUuid.php');

/**
 * UUID Field
 * 
 * Generates a new UUID and renders it in a readonly="readonly" input element
 * 
 * @param int $tabIndex
 * @param string $label
 * @param string $name
 * @param string $value
 * @return void
 */
function uuidField(
  int $tabIndex = 2,
  string $label = 'GUID',
  string $name = 'guid',
  string $value = ''
) {

  // Use UUID from last submission attempt to save compute
  if (array_key_exists($name, $_REQUEST)) {
    $value = $_REQUEST[$name];
  }

  // If no value by this point then generate a new random UUID
  if ('' === $value) {
    $value = generateUuid();
  }

  $inputID = sprintf('InputUUID_%d', $tabIndex);

  ?>
  <div 
    class="component-form-field">
    <label
      for="<?=$inputID?>">
      <?=$label?>
    </label>

    <input 
      id="<?=$inputID?>"
      name="<?=$name?>"
      type="input"
      tabindex="<?=$tabIndex?>"
      readonly="readonly"
      value="<?=$value?>" />
  </div>
  <?php

}
