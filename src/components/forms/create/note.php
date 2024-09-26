<?php
/**
 * Create Note Form Component
 */
?>

<div 
  class="component-form-create-note">
  <div 
    class="component-form-create-note-field">
    <label
      for="CreateNoteInputName">
      Note Name
    </label>

    <input 
      id="CreateNoteInputName"
      name="noteName"
      type="input"
      tabindex="2" />
  </div>

  <div
    class="component-form-create-note-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit">
      Create
    </button>

    <input
      name="is_create_note_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }

  div.component-form-create-note {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    min-width: 20rem;
    max-width: 30vw;
  }

  div.component-form-create-note div.component-form-create-note-field {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    padding: 0.5rem 0;
  }

  div.component-form-create-note div.component-form-create-note-buttons {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    height: 2.5rem;
  }

  div.component-form-create-note div.component-form-create-note-buttons > * {
    cursor: pointer;
  }
</style>
