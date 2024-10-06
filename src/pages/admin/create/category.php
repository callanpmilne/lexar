<?php

require_once('../src/methods/Category/createCategory.php');

/**
 * Create Category Page
 */

$isCreateCategorySubmit = 
  array_key_exists('is_create_category_submit', $_POST)
    && '1' === $_POST['is_create_category_submit'];

if ($isCreateCategorySubmit) {
  // Category ID
  $ID = strtolower($_POST['uuid']);

  // Category Name
  $name = strtolower($_POST['categoryName']);

  // Category Parent ID
  $parentID = array_key_exists('categoryParentID', $_POST)
    && strlen($_POST['categoryParentID']) === 36
    ? $_POST['categoryParentID']
    : null;

  // attempt to create category
  createCategory(new Category(
    $ID,
    $name,
    $path,
    $parentID
  ));
}
?>

<main>
  <div id="PageTitle">
    <h1>Create Category</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <form 
    action="/admin/create/category" 
    method="POST">
    <?php include('../src/common/form/create/category.php'); ?>
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