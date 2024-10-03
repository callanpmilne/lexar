<?php
/**
 * Create Metadata Page
 */

$isCreateMetadataSubmit = 
  array_key_exists('is_create_metadata_submit', $_POST)
    && '1' === $_POST['is_create_metadata_submit'];

if ($isCreateMetadataSubmit) {
  // Metadata Name
  $name = strtolower($_POST['metadataName']);

  // attempt to create metadata
  // ...
}
?>

<main>
  <div id="PageTitle">
    <h1>Create Metadata</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <form 
    action="/admin/create/metadata" 
    method="POST">
    <?php include('../src/components/forms/create/metadata.php'); ?>
  </form>

  <?php if ($isCreateMetadataSubmit) : ?>
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