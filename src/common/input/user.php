<?php

function userField(
  string $label = 'User',
  string $name = 'UserID',
  string $value = ''
) {
  ?>
  <div 
    class="component-form-field">
    <label
      for="UserIDInput">
      <?=$label?>
    </label>

    <input 
      id="UserIDInput"
      name="<?=$name?>"
      type="input"
      tabindex="1"
      placeholder="Enter User ID ..."
      value="<?=htmlentities($value)?>" />
  </div>

  <script>
    (function ($) {
      $.document.getElementById('UserIDInput').focus();
    })(window);
  </script>
  <?php
}