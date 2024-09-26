<?php
/**
 * Create Contact Form Component
 */

include('../src/components/forms/input/uuid.php');
?>

<div 
  class="component-form">

  <?=uuidField('Contact ID')?> 

  <div 
    class="component-form-field">
    <label
      for="CreateContactInputName">
      Contact Name
    </label>

    <input 
      id="CreateContactInputName"
      name="contactName"
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
