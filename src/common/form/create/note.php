<?php
/**
 * Create Note Form Component
 */
?>

<div 
  class="component-form">
  <div 
    class="component-form-field">
    <label
      for="CreateNoteInputContent">
      Note
    </label>

    <textarea 
      id="CreateNoteInputContent"
      name="noteContentBody"
      tabindex="3"></textarea>
  </div>

  <div
    class="component-form-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit">
      Add Note
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
</style>
