<?php

require_once("../src/class/AuthAttempt.php");

/**
 * User Login Page
 */

$globalSession = $GLOBALS["sess"];
if ($globalSession->getSession()->isLoggedIn()) {
  redirectAuthedUser($globalSession->getUser()->IsSuperAdmin);
}

$isLoginSubmit = array_key_exists('is_login_submit', $_POST)
&& '1' === $_POST['is_login_submit'];

?>

<main>
<div id="PageTitle">
  <h1>User Login</h1>
  </div>

  <?php
    if ($isLoginSubmit) {
      // Email Address
      $username = strtolower($_POST['username']);

      // Password
      $password = $_POST['password'];

      // Handle submission
      handleSubmit($username, $password);
    }
  ?>

  <form 
    id="UserLoginForm"
    action="/login" 
    method="POST">
    <?php include('../src/components/forms/login.php'); ?>
  </form>

  <?php if (false && $isLoginSubmit) : ?>
    <div
      class="component-form-login-debug">
      <h2>Debug</h2>
      <pre><?php var_dump($_POST); ?></pre>
    </div>
  <?php endif; ?>
</main>

<style>
  #UserLoginForm {

  }
  
  div.component-form-login-debug {
    border: 1px solid;
    padding: 0 1rem 1rem;
    margin-bottom: 2rem;
  }

  section#LoginErrorNotice {
    background: linear-gradient(45deg, rgba(0,0,0,0.3), rgba(0,0,0,0.3)););
    padding: 1rem;
    border-radius: 0.5rem;
    box-shadow: 1px 1px 5px rgba(0,0,0,0.5);
    border: 1px solid rgba(255,255,255,0.8);
    margin-top: 0rem;
    width: 80vw;
    max-width: 100%;
    margin-bottom: 2rem;
  }

  section#LoginErrorNotice h2 {
    margin: 0 0 1rem;
    font-size: 1.2rem;
    color: rgba(232,40,100,1);
    border-bottom: 1px solid;
  }

  section#LoginErrorNotice p {
    margin: 1rem 0 0;
    font-size: 0.9rem;
  }
</style>

<?php

/**
 * Handle Form Submission
 * 
 * @param string $username Input username
 * @param string $password Input password
 * @return void
 */
function handleSubmit (
  string $username, 
  string $password
) {
  $authAttempt = new AuthAttempt(
    $username,
    $password
  );

  try {
    $user = GlobalSession::authSession($authAttempt);
  }
  catch (SessionException $e) {
    return invalidLogin();
  }

  return validLogin($user);
}

/**
 * Invalid Login
 * 
 * Handle an invalid login.
 * 
 * @return void
 */
function invalidLogin () {
  ?>
  <section id="LoginErrorNotice">
    <h2>Invalid Login</h2>
    <p>The credentials provided did not match any user in our database.</p>
  </section>
  <?php
}

/**
 * Valid Login
 * 
 * Handle a valid login.
 * 
 * @param User $user The Authorised User
 * @return void
 */
function validLogin (
  User $user
) {
  redirectAuthedUser($user->IsSuperAdmin);
}

/**
 * Redirect Authed User
 * 
 * Redirect a user to their dashboard (superadmins) or the homepage (user).
 * 
 * @param bool $isSuperAdmin
 */
function redirectAuthedUser (
  bool $isSuperAdmin
) {
  // If there is a 'redirect' key in the $_REQUEST
  // then try to send the user there
  if (array_key_exists('redirect', $_REQUEST)) {
    inlineRedirect($_REQUEST['redirect']);
    return;
  }

  // If they are an admin, try to send the user to the
  // admin dashboard route (/admin)
  if (true === $isSuperAdmin) {
    inlineRedirect('/admin');
    return;
  }

  // Try to send the user to the homepage route (/)
  inlineRedirect('/');
}
