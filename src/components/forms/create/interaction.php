<?php
/**
 * Create Type Form Component
 */
?>

<div 
  class="component-form-create-interaction">
  <div 
    class="component-form-create-interaction-field">
    <label
      for="CreateTypeInputName">
      Type Name
    </label>

    <input 
      id="CreateTypeInputName"
      name="interactionName"
      type="input"
      tabindex="2" />
  </div>

  <div
    class="component-form-create-interaction-buttons">

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

  div.component-form-create-interaction {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    min-width: 20rem;
    max-width: 30vw;
  }

  div.component-form-create-interaction div.component-form-create-interaction-field {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    padding: 0.5rem 0;
  }

  div.component-form-create-interaction div.component-form-create-interaction-buttons {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    height: 2.5rem;
  }

  div.component-form-create-interaction div.component-form-create-interaction-buttons > * {
    cursor: pointer;
  }
</style>
