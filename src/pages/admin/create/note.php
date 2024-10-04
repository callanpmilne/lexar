<?php
/**
 * Create Note Page
 */

$isCreateNoteSubmit = 
  array_key_exists('is_create_note_submit', $_POST)
    && '1' === $_POST['is_create_note_submit'];

if ($isCreateNoteSubmit) {
  // Note Name
  $name = strtolower($_POST['noteName']);

  // attempt to create note
  // ...
}
?>

<main>
  <div id="PageTitle">
    <h1>Create Note</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <form 
    action="/admin/create/note" 
    method="POST">
    <?php include('../src/common/form/create/note.php'); ?>
  </form>

  <?php if ($isCreateNoteSubmit) : ?>
    <div
      class="component-form-login-debug">
      <h2>Debug</h2>
      <pre><?php var_dump($_POST); ?></pre>
    </div>
  <?php endif; ?>
</main>

<style>
  div.component-form-login-debug {
    border: 1px solid;
    padding: 0 1rem 1rem;
    margin-bottom: 2rem;
  }
</style>