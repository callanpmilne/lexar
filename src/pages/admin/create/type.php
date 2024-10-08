<?php
/**
 * Type Type Page
 */

$isTypeTypeSubmit = 
  array_key_exists('is_create_type_submit', $_POST)
    && '1' === $_POST['is_create_type_submit'];

if ($isTypeTypeSubmit) {
  // Type Name
  $name = strtolower($_POST['typeName']);

  // attempt to create type
  // ...
}
?>

<main>
  <div id="PageTitle">
    <h1>Entity Type</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <form 
    action="/admin/create/type" 
    method="POST">
    <?php include('../src/common/form/create/type.php'); ?>
  </form>

  <?php if ($isTypeTypeSubmit) : ?>
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