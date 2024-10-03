<?php
/**
 * Create Type Form Component
 */

include('../src/components/forms/input/uuid.php');
?>

<div 
  class="component-form">

  <?=uuidField('Content Type ID')?> 

  <div 
    class="component-form-field">
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
    class="component-form-buttons">

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
</style>
