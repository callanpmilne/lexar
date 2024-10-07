<?php

function categoryField(
  int $tabIndex = 1,
  string $label = 'Category',
  string $name = 'categoryID',
  string $value = ''
) {
  $previousValue = array_key_exists($name, $_REQUEST) ? $_REQUEST[$name] : '';
  $value = htmlentities($value ? $value : $previousValue);
  $elemID = sprintf(
    '%s_%d', 
    'CategoryIDInput',
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
        
        clearCategories();

        if (value.length < 3) {
          return;
        }

        if ('' === value) {
          return;
        }

        fetchCategories(value);
      });

      function $optionsEl () {
        return $.document.querySelector("#<?=$elemID?>").parentNode.querySelector(".predictive-options");
      }

      function reqListener () {
        const $el = $optionsEl();
        const categories = JSON.parse(this.response);

        clearCategories();

        if (!Array.isArray(categories) || categories.length === 0) {
          return;
        }

        $el.setAttribute('class', 'predictive-options');

        categories.forEach((cat.ID, cat.Label, cat.Route) => {
          $el.appendChild(resultOptionDiv(cat));
        });
      }

      function clearCategories () {
        $optionsEl().innerHTML = '';
        hideCategoryList();
      }

      function hideCategoryList () {
        $optionsEl().setAttribute('class', 'predictive-options hidden');
      }

      function fetchCategories (query) {
        fetchResponse(
          '/api/categories.json?q=' + encodeURIComponent(query),
          reqListener
        );
      }

      function selectCategory (ID, Label, Route) {
        $.document.querySelector('#<?=$elemID?>').value = ID;
        clearCategories();
      }

      function resultOptionDiv (ID, Label, Route) {
        const newDiv = $.document.createElement('div');
        
        newDiv.innerHTML = '<span>' + Label + '</span>'
          + '<span>' + Route + '</span>';

        newDiv.addEventListener('click', () => {
          selectCategory(ID, Label, Route)
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