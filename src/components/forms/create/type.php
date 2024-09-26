<?php
/**
 * Create Type Form Component
 */
?>

<div 
  class="component-form-create-type">
  <div 
    class="component-form-create-type-field">
    <label
      for="CreateTypeInputName">
      Type Name
    </label>

    <input 
      id="CreateTypeInputName"
      name="typeName"
      type="input"
      tabindex="2" />
  </div>

  <div
    class="component-form-create-type-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit">
      Create
    </button>

    <input
      name="is_create_type_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }

  div.component-form-create-type {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    min-width: 20rem;
    max-width: 30vw;
  }

  div.component-form-create-type div.component-form-create-type-field {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    padding: 0.5rem 0;
  }

  div.component-form-create-type div.component-form-create-type-buttons {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    height: 2.5rem;
  }

  div.component-form-create-type div.component-form-create-type-buttons > * {
    cursor: pointer;
  }
</style>
