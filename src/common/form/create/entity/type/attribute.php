<?php

/**
 * Create Entity Type Attribute Form Component
 */

include('../src/common/input/uuid.php');
include('../src/common/input/entity/name.php');

?>

<div 
  class="component-form">

  <?=uuidField(1, 'Entity Type Attribute ID')?> 

  <div 
    class="component-form-field">
    <label
      for="CreateEntityTypeAttributeInputType">
      Entity Type
    </label>

    <input 
      id="CreateEntityTypeAttributeInputType"
      name="entityType"
      type="input"
      value="<?=htmlspecialchars($_REQUEST['entityType'] ?? '', ENT_QUOTES)?>"
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
      name="is_create_entity_type_attribute_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }
</style>