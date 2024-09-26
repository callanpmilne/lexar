<?php
/**
 * Create Interaction Form Component
 */

include('../src/components/forms/input/uuid.php');
?>

<div 
  class="component-form">

  <?=uuidField('Interaction ID')?> 

  <div 
    class="component-form-field">
    <label
      for="CreateInteractionInputName">
      Interaction Name
    </label>

    <input 
      id="CreateInteractionInputName"
      name="interactionName"
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
