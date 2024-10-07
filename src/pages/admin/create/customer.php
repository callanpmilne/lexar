<?php

require_once('../src/class/Customer.php');
require_once('../src/methods/Customer/createCustomer.php');

/**
 * Create Customer Page
 */

$isCreateCustomerSubmit = 
  array_key_exists('is_create_customer_submit', $_POST)
    && '1' === $_POST['is_create_customer_submit'];

if ($isCreateCustomerSubmit) {
  
  // Customer ID
  $customerID = $_POST['uuid'];

  // Customer Name
  $customerName = $_POST['customerName'];

  // attempt to create customer
  $result = createCustomer(new Customer(
    $customerID,
    $customerName
  ));

  // redirect user to customer admin page on successful creation
  if (true === $result) {
    ?>
    <script>"use strict"; (function (w) {
      const customerURI = '/admin/view/customer/<?=$customerID?>';
      w.location.assign(customerURI);
    })(window);</script>
    <?php
    exit(0);
  }

}
?>

<main>
  <div id="PageTitle">
    <h1>Create Customer</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <form 
    action="/admin/create/customer" 
    method="POST">
    <?php include('../src/common/form/create/customer.php'); ?>
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