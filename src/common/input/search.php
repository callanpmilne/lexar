<?php

function searchField(
  string $label = 'GUID',
  string $name = 'input',
  string $value = ''
) {
  ?>
  <div 
    class="component-form-field">
    <label
      for="SearchQueryInput">
      <?=$label?>
    </label>

    <input 
      id="SearchQueryInput"
      name="<?=$name?>"
      type="input"
      tabindex="1"
      placeholder="Enter Search Keywords..."
      value="<?=htmlentities($value)?>" />
  </div>

  <script>
    (function ($) {
      $.document.getElementById('SearchQueryInput').focus();
    })(window);
  </script>
  <?php
}