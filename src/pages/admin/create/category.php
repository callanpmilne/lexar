<?php
/**
 * Create Category Page
 */

$isCreateCategorySubmit = 
  array_key_exists('is_create_category_submit', $_POST)
    && '1' === $_POST['is_create_category_submit'];

if ($isCreateCategorySubmit) {
  // Category Name
  $name = strtolower($_POST['categoryName']);

  // attempt to create category
  // ...
}
?>

<main>
  <h1>Create Category</h1>

  <p>
    <a href="/admin">
      &larr; Admin Dashboard
    </a>
  </p>

  <form 
    action="/admin/create/category" 
    method="POST">
    <?php include('../src/components/forms/create/category.php'); ?>
  </form>

  <?php if ($isCreateCategorySubmit) : ?>
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