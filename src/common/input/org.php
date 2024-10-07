<?php

function orgField(
  int $tabIndex = 1,
  string $label = 'Organisation',
  string $name = 'orgID',
  string $value = ''
) {
  $previousValue = array_key_exists($name, $_REQUEST) ? $_REQUEST[$name] : '';
  $value = htmlentities($value ? $value : $previousValue);
  $elemID = sprintf(
    '%s_%d', 
    'OrganisationIDInput',
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
        
        clearOrganisations();

        if (value.length < 3) {
          return;
        }

        if ('' === value) {
          return;
        }

        fetchOrganisations(value);
      });

      function $optionsEl () {
        console.log("#<?=$elemID?>");
        return $.document.querySelector("#<?=$elemID?>").parentNode.querySelector(".predictive-options");
      }

      function reqListener () {
        const $el = $optionsEl();
        const orgs = JSON.parse(this.response);

        clearOrganisations();

        if (!Array.isArray(orgs) || orgs.length === 0) {
          return;
        }

        $el.setAttribute('class', 'predictive-options');

        orgs.forEach((cust) => {
          $el.appendChild(resultOptionDiv(cust.ID, cust.Name));
        });
      }

      function clearOrganisations () {
        $optionsEl().innerHTML = '';
        hideOrganisationList();
      }

      function hideOrganisationList () {
        $optionsEl().setAttribute('class', 'predictive-options hidden');
      }

      function fetchOrganisations (query) {
        fetchResponse(
          '/api/orgs.json?q=' + encodeURIComponent(query),
          reqListener
        );
      }

      function selectOrganisation (ID, Label) {
        $.document.querySelector('#<?=$elemID?>').value = ID;
        clearOrganisations();
      }

      function resultOptionDiv (ID, Label) {
        const newDiv = $.document.createElement('div');
        newDiv.innerHTML = '<span>' + Label + '</span>';
        newDiv.addEventListener('click', () => {
          selectOrganisation(ID, Label)
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