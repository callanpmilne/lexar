<?php

/**
 * Create Entity Form Component
 */

include('../src/common/input/uuid.php');

?>

<div 
  class="component-form">

  <?=uuidField('Entity ID')?> 

  <!-- entity type fields -->

  <div
    class="component-form-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit">
      Create
    </button>

    <input
      name="is_create_entity_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }
</style>