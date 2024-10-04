<?php
/**
 * Create Metadata Form Component
 */

include('../src/common/form/input/uuid.php');
?>

<div 
  class="component-form">

  <?=uuidField('Metadata ID')?> 

  <div 
    class="component-form-field">
    <label
      for="CreateMetadataInputKey">
      Metadata Key
    </label>

    <input 
      id="CreateMetadataInputKey"
      name="metadataKey"
      type="input"
      tabindex="2" />
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreateMetadataInputValue">
      Metadata Value
    </label>

    <input 
      id="CreateMetadataInputValue"
      name="metadataValue"
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
      name="is_create_metadata_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }
</style>
