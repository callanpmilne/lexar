<?php
/**
 * Create Metadata Form Component
 */
?>

<div 
  class="component-form-create-metadata">
  <div 
    class="component-form-create-metadata-field">
    <label
      for="CreateMetadataInputName">
      Metadata Name
    </label>

    <input 
      id="CreateMetadataInputName"
      name="metadataName"
      type="input"
      tabindex="2" />
  </div>

  <div
    class="component-form-create-metadata-buttons">

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

  div.component-form-create-metadata {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    min-width: 20rem;
    max-width: 30vw;
  }

  div.component-form-create-metadata div.component-form-create-metadata-field {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    padding: 0.5rem 0;
  }

  div.component-form-create-metadata div.component-form-create-metadata-buttons {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    height: 2.5rem;
  }

  div.component-form-create-metadata div.component-form-create-metadata-buttons > * {
    cursor: pointer;
  }
</style>
