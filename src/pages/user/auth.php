<?php
/**
 * User Login Page
 */

$isLoginSubmit = array_key_exists('is_login_submit', $_POST)
&& '1' === $_POST['is_login_submit'];

if ($isLoginSubmit) {
  // Email Address
  $emailAddress = strtolower($_POST['emailAddress']);

  // Password
  $password = $_POST['password'];

  // attempt authentication
  // ...
}
?>

<main>
  <h1>User Login</h1>

  <form 
    id="UserLoginForm"
    action="/login" 
    method="POST">
    <?php include('../src/components/forms/login.php'); ?>
  </form>

  <?php if ($isLoginSubmit) : ?>
    <div
      class="component-form-login-debug">
      <h2>Debug</h2>
      <pre><?php var_dump($_POST); ?></pre>
    </div>
  <?php endif; ?>
</main>

<style>
  #UserLoginForm {
    margin-top: 4rem;
  }
  
  div.component-form-login-debug {
    border: 1px solid;
    padding: 0 1rem 1rem;
    margin-bottom: 2rem;
  }
</style>