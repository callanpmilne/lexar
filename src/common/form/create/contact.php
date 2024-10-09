<?php
/**
 * Create Contact Form Component
 */

include('../src/common/input/uuid.php');
include('../src/common/input/customer.php');
?>

<div 
  class="component-form">

  <?=uuidField(1, 'Contact Method ID')?> 

  <?=customerField(2)?>

  <div 
    class="component-form-field">
    <label
      for="CreateContactMethodInputMedium">
      Medium
    </label>

    <select 
      id="CreateContactMethodInputMedium"
      name="contactMethodMedium"
      tabindex="3">
      <option value="PHONE">Phone</option>
      <option value="EMAIL">E-Mail</option>
    </select>
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreateContactMethodInputIdentifier">
      Identifier
    </label>

    <input 
      id="CreateContactMethodInputIdentifier"
      name="contactMethodIdentifier"
      type="input"
      tabindex="4"
      placeholder="e.g. +614123456789 or someone@somehost.tld" />
  </div>

  <div
    class="component-form-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit"
      tabindex="5">
      Create
    </button>

    <input
      name="is_create_contact_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }
</style>
