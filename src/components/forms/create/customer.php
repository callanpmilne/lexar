<?php
/**
 * Create Customer Form Component
 */
?>

<div 
  class="component-form-create-customer">
  <div 
    class="component-form-create-customer-field">
    <label
      for="CreateCustomerInputName">
      Customer Name
    </label>

    <input 
      id="CreateCustomerInputName"
      name="customerName"
      type="input"
      tabindex="2" />
  </div>

  <div
    class="component-form-create-customer-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit">
      Create
    </button>

    <input
      name="is_create_customer_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }

  div.component-form-create-customer {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    min-width: 20rem;
    max-width: 30vw;
  }

  div.component-form-create-customer div.component-form-create-customer-field {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    padding: 0.5rem 0;
  }

  div.component-form-create-customer div.component-form-create-customer-buttons {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    height: 2.5rem;
  }

  div.component-form-create-customer div.component-form-create-customer-buttons > * {
    cursor: pointer;
  }
</style>
