<?php
/**
 * Create Payment Form Component
 */
?>

<div 
  class="component-form-create-payment">
  <div 
    class="component-form-create-payment-field">
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
    class="component-form-create-payment-buttons">

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

  div.component-form-create-payment {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    min-width: 20rem;
    max-width: 30vw;
  }

  div.component-form-create-payment div.component-form-create-payment-field {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    padding: 0.5rem 0;
  }

  div.component-form-create-payment div.component-form-create-payment-buttons {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    height: 2.5rem;
  }

  div.component-form-create-payment div.component-form-create-payment-buttons > * {
    cursor: pointer;
  }
</style>
