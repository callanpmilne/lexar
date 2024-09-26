<?php
/**
 * Create Contact Form Component
 */
?>

<div 
  class="component-form-create-contact">
  <div 
    class="component-form-create-contact-field">
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
    class="component-form-create-contact-buttons">

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

  div.component-form-create-contact {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    min-width: 20rem;
    max-width: 30vw;
  }

  div.component-form-create-contact div.component-form-create-contact-field {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    padding: 0.5rem 0;
  }

  div.component-form-create-contact div.component-form-create-contact-buttons {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    height: 2.5rem;
  }

  div.component-form-create-contact div.component-form-create-contact-buttons > * {
    cursor: pointer;
  }
</style>
