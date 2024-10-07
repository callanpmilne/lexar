<?php
/**
 * Create Payment Form Component
 */

include('../src/common/input/customer.php');
include('../src/common/input/uuid.php');
include('../src/common/input/org.php');
?>

<div 
  class="component-form">

  <?=uuidField('Payment ID')?> 

  <?=customerField(2)?>

  <div 
    class="component-form-field">
    <label
      for="CreatePaymentInputDescription">
      Payment Description
    </label>

    <input 
      id="CreatePaymentInputDescription"
      name="paymentDescription"
      type="input"
      tabindex="3"
      placeholder="E.g. Account Top-Up" />
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreatePaymentInputAmount">
      Payment Amount
    </label>

    <input 
      id="CreatePaymentInputAmount"
      name="paymentAmount"
      type="input"
      tabindex="4"
      placeholder="E.g. 100.00" />
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreatePaymentInputFeeAmount">
      Payment Fee Amount
    </label>

    <input 
      id="CreatePaymentInputFeeAmount"
      name="paymentFeeAmount"
      type="input"
      tabindex="5"
      placeholder="E.g. 10.00" />
  </div>

  <?=orgField(6, "Payment Processor ID", "paymentProcessor")?>

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
