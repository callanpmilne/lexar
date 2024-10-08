<?php

/**
 * Create Entity Type Form Component
 */

include('../src/common/input/uuid.php');
include('../src/common/input/entityName.php');

?>

<div 
  class="component-form">

  <?=uuidField('Entity Type ID')?> 

  <div 
    class="component-form-field">
    <label
      for="CreateEntityTypeInputParent">
      Parent Type
    </label>

    <input 
      id="CreateEntityTypeInputParent"
      name="entityType"
      type="input"
      tabindex="2" />
  </div>

  <?=entityNameFields(3)?>

  <div
    class="component-form-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit">
      Create
    </button>

    <input
      name="is_create_entity_attribute_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }
</style>