<?php

/**
 * Create Entity Type Form Component
 */

include('../src/common/input/uuid.php');
include('../src/common/input/entity/name.php');
include('../src/common/input/entity/type.php');

?>

<div 
  class="component-form">

  <?=uuidField(1, 'Entity Attribute ID')?> 

  <?=entityTypeField(2, 'Entity Type ID', 'type')?> 

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