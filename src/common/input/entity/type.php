<?php

function entityTypeField(
  int $tabIndex = 1,
  string $label = 'Entity Type',
  string $name = 'entityTypeID',
  string $value = ''
) {
  $previousValue = array_key_exists($name, $_REQUEST) 
    ? $_REQUEST[$name] : '';
  
  $value = htmlentities($value ? $value : $previousValue);
  $elemID = sprintf(
    'EntityTypeIDInput_%d', 
    $tabIndex
  );

  ?>
  <div 
    class="component-form-field">
    <label
      for="<?=$elemID?>">
      <?=$label?>
    </label>

    <input 
      id="<?=$elemID?>"
      name="<?=$name?>"
      type="input"
      tabindex="<?=$tabIndex?>"
      placeholder="Start Typing ..."
      value="<?=$value?>" />

    <div class="predictive-options hidden"></div>
  </div>

  <script>"use strict";
    (function ($) {
      
      <? if ($tabIndex === 1) : ?>
        $.document.querySelector('#<?=$elemID?>').focus();
      <? endif; ?>
      
      $.document.querySelector('#<?=$elemID?>').addEventListener("input", (e) => {
        let value = e.target.value;
        
        clearEntityTypes();

        if (value.length < 3) {
          return;
        }

        if ('' === value) {
          return;
        }

        fetchEntityTypes(value);
      });

      function $optionsEl () {
        console.log("#<?=$elemID?>");
        return $.document.querySelector("#<?=$elemID?>").parentNode.querySelector(".predictive-options");
      }

      function reqListener () {
        const $el = $optionsEl();
        const orgs = JSON.parse(this.response);

        clearEntityTypes();

        if (!Array.isArray(orgs) || orgs.length === 0) {
          return;
        }

        $el.setAttribute('class', 'predictive-options');

        orgs.forEach((cust) => {
          $el.appendChild(resultOptionDiv(cust.ID, cust.Name));
        });
      }

      function clearEntityTypes () {
        $optionsEl().innerHTML = '';
        hideEntityTypeList();
      }

      function hideEntityTypeList () {
        $optionsEl().setAttribute('class', 'predictive-options hidden');
      }

      function fetchEntityTypes (query) {
        fetchResponse(
          '/api/entity/types.json?q=' + encodeURIComponent(query),
          reqListener
        );
      }

      function selectEntityType (ID, Label) {
        $.document.querySelector('#<?=$elemID?>').value = ID;
        clearEntityTypes();
      }

      function resultOptionDiv (ID, Label) {
        const newDiv = $.document.createElement('div');
        newDiv.innerHTML = '<span>' + Label + '</span>';
        newDiv.addEventListener('click', () => {
          selectEntityType(ID, Label)
        });
        return newDiv;
      }

      function fetchResponse (url, cb) {
        const req =  new XMLHttpRequest();
        req.addEventListener("loadend", cb);
        req.open("GET", url);
        req.send();
      }
    })(window);
  </script>
  <?php
}