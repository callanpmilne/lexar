<?php

function customerField(
  int $tabIndex = 1,
  string $label = 'Customer',
  string $name = 'customerID',
  string $value = ''
) {
  ?>
  <div 
    class="component-form-field">
    <label
      for="CustomerIDInput">
      <?=$label?>
    </label>

    <input 
      id="CustomerIDInput"
      name="<?=$name?>"
      type="input"
      tabindex="<?=$tabIndex?>"
      placeholder="Start Typing ..."
      value="<?=htmlentities($value)?>" />

    <div class="predictive-options"></div>
  </div>

  <script>
    (function ($) {"use strict";
      $.document.querySelector('#CustomerIDInput').focus();
      
      $.document.querySelector('#CustomerIDInput').addEventListener("keypress", (e) => {
        fetchCustomers(e.target.value);
      });

      function $optionsEl () {
        return $.document.querySelector(".predictive-options");
      }

      function reqListener () {
        const customers = JSON.parse(this.response);

        $optionsEl().innerHTML = '';

        customers.forEach((cust) => {
          $optionsEl().appendChild(resultOptionDiv(cust.ID, cust.Name));
        });
      }

      function fetchCustomers (query) {
        fetchResponse(
          '/api/customers.json?q=' + encodeURIComponent(query),
          reqListener
        );
      }

      function selectCustomer (ID, Label) {
        $.document.querySelector('#CustomerIDInput').value = ID;
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