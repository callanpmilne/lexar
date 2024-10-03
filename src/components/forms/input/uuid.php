<?php

require_once('../src/methods/generateUuid.php');

function uuidField(
  string $label = 'GUID',
  string $value = ''
) {

  if ('' === $value) {
    $value = generateUuid();
  }

  ?>
  <div 
    class="component-form-field">
    <label
      for="InputUUID">
      <?=$label?>
    </label>

    <input 
      id="InputUUID"
      name="uuid"
      type="input"
      tabindex="2"
      readonly="readonly"
      value="<?=$value?>" />
  </div>
  <?php

}
