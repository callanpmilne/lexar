<?php
/**
 * Create Payment Page
 */

$isCreatePaymentSubmit = 
  array_key_exists('is_create_payment_submit', $_POST)
    && '1' === $_POST['is_create_payment_submit'];

if ($isCreatePaymentSubmit) {
  // Payment Name
  $name = strtolower($_POST['paymentName']);

  // attempt to create payment
  // ...
}
?>

<main>
  <h1>Create Payment</h1>

  <p>
    <a href="/admin">
      &larr; Admin Dashboard
    </a>
  </p>

  <form 
    action="/admin/create/payment" 
    method="POST">
    <?php include('../src/components/forms/create/payment.php'); ?>
  </form>

  <?php if ($isCreatePaymentSubmit) : ?>
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