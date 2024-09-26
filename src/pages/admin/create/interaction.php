<?php
/**
 * Create Interaction Page
 */

$isCreateInteractionSubmit = 
  array_key_exists('is_create_interaction_submit', $_POST)
    && '1' === $_POST['is_create_interaction_submit'];

if ($isCreateInteractionSubmit) {
  // Interaction Name
  $name = strtolower($_POST['interactionName']);

  // attempt to create interaction
  // ...
}
?>

<main>
  <h1>Create Interaction</h1>

  <p class="breadcrumbs">
    <a href="/admin">
      &larr; Admin Dashboard
    </a>
  </p>

  <form 
    action="/admin/create/interaction" 
    method="POST">
    <?php include('../src/components/forms/create/interaction.php'); ?>
  </form>

  <?php if ($isCreateInteractionSubmit) : ?>
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