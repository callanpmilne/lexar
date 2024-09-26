<?php
/**
 * Create Payment Form Component
 */

include('../src/components/forms/input/uuid.php');
?>

<div 
  class="component-form">

  <?=uuidField('Payment ID')?> 

  <div 
    class="component-form-field">
    <label
      for="CreatePaymentInputName">
      Payment Name
    </label>

    <input 
      id="CreatePaymentInputName"
      name="paymentName"
      type="input"
      tabindex="2" />
  </div>

  <div
    class="component-form-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit">
      Create
    </button>

    <input
      name="is_create_payment_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }
</style>
