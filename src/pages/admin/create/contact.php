<?php
/**
 * Create Contact Page
 */

$isCreateContactSubmit = 
  array_key_exists('is_create_contact_submit', $_POST)
    && '1' === $_POST['is_create_contact_submit'];

if ($isCreateContactSubmit) {
  // Contact Name
  $name = strtolower($_POST['contactName']);

  // attempt to create contact
  // ...
}
?>

<main>
  <h1>Create Contact</h1>

  <p>
    <a href="/admin">
      &larr; Admin Dashboard
    </a>
  </p>

  <form 
    action="/admin/create/contact" 
    method="POST">
    <?php include('../src/components/forms/create/contact.php'); ?>
  </form>

  <?php if ($isCreateContactSubmit) : ?>
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