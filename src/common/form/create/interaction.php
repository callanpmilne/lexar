<?php
/**
 * Create Interaction Form Component
 */

include('../src/common/input/uuid.php');
include('../src/common/input/customer.php');
?>

<div 
  class="component-form">

  <?=uuidField(1, 'Interaction ID')?> 

  <?=customerField(2)?>

  <div 
    class="component-form-field">
    <label
      for="CreateInteractionInputName">
      Interaction Notes
    </label>

    <textarea 
      id="CreateInteractionInputContent"
      name="interactionContentBody"
      tabindex="3"></textarea>
  </div>

  <div
    class="component-form-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit"
      tabindex="4">
      Create
    </button>

    <input
      name="is_create_interaction_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }
</style>
