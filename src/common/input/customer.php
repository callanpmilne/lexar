<?php

function customerField(
  int $tabIndex = 1,
  string $label = 'Customer',
  string $name = 'customerID',
  string $value = ''
) {
  $previousValue = array_key_exists($name, $_REQUEST) ? $_REQUEST[$name] : '';
  $value = htmlentities($value ? $value : $previousValue);
  $elemID = sprintf(
    '%s_%d', 
    'CustomerIDInput',
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
      value="<?=htmlentities($value)?>" />

    <div class="predictive-options hidden"></div>
  </div>

  <script>"use strict";
    (function ($) {
      
      <? if ($tabIndex === 1) : ?>
        $.document.querySelector('#<?=$elemID?>').focus();
      <? endif; ?>
      
      $.document.querySelector('#<?=$elemID?>').addEventListener("input", (e) => {
        let value = e.target.value;
        
        clearCustomers();

        if (value.length < 3) {
          return;
        }

        if ('' === value) {
          return;
        }

        fetchCustomers(value);
      });

      function $optionsEl () {
        return $.document.querySelector("#<?=$elemID?>").parentNode.querySelector(".predictive-options");
      }

      function reqListener () {
        const $el = $optionsEl();
        const customers = JSON.parse(this.response);

        clearCustomers();

        if (!Array.isArray(customers) || customers.length === 0) {
          return;
        }

        $el.setAttribute('class', 'predictive-options');

        customers.forEach((cust) => {
          $el.appendChild(resultOptionDiv(cust.ID, cust.Name));
        });
      }

      function clearCustomers () {
        $optionsEl().innerHTML = '';
        hideCustomerList();
      }

      function hideCustomerList () {
        $optionsEl().setAttribute('class', 'predictive-options hidden');
      }

      function fetchCustomers (query) {
        fetchResponse(
          '/api/customers.json?q=' + encodeURIComponent(query),
          reqListener
        );
      }

      function selectCustomer (ID, Label) {
        $.document.querySelector('#<?=$elemID?>').value = ID;
        clearCustomers();
      }

      function resultOptionDiv (ID, Label) {
        const newDiv = $.document.createElement('div');
        newDiv.innerHTML = '<span>' + Label + '</span>';
        newDiv.addEventListener('click', () => {
          selectCustomer(ID, Label)
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