<?php
/**
 * Create Contact Form Component
 */

include('../src/components/forms/input/uuid.php');
?>

<div 
  class="component-form">

  <?=uuidField('Contact Method ID')?> 

  <div 
    class="component-form-field">
    <label
      for="CreateContactMethodInputMedium">
      Medium
    </label>

    <select 
      id="CreateContactMethodInputMedium"
      name="contactMethodMedium"
      tabindex="2">
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
      tabindex="3"
      placeholder="e.g. +614123456789 or someone@somehost.tld" />
  </div>

  <div
    class="component-form-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit">
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
