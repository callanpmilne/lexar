<?php
/**
 * Create Customer Page
 */

$isCreateCustomerSubmit = 
  array_key_exists('is_create_customer_submit', $_POST)
    && '1' === $_POST['is_create_customer_submit'];

if ($isCreateCustomerSubmit) {
  // Customer Name
  $name = strtolower($_POST['customerName']);

  // attempt to create customer
  // ...
}
?>

<main>
  <h1>Create Customer</h1>

  <p>
    <a href="/admin">
      &larr; Admin Dashboard
    </a>
  </p>

  <form 
    action="/admin/create/customer" 
    method="POST">
    <?php include('../src/components/forms/create/customer.php'); ?>
  </form>

  <?php if ($isCreateCustomerSubmit) : ?>
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