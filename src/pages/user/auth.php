<?php

require_once('../src/methods/User/fetchUser.php');
require_once('../src/methods/User/fetchUserHash.php');

/**
 * User Login Page
 */

$isLoggedIn = array_key_exists('is_logged_in', $_SESSION) && true === $_SESSION['is_logged_in'];
if ($isLoggedIn) {
  redirectAuthedUser($_SESSION['user']['IsSuperAdmin']);
}

$isLoginSubmit = array_key_exists('is_login_submit', $_POST)
&& '1' === $_POST['is_login_submit'];

?>

<main>
  <h1>User Login</h1>

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
    margin-top: 4rem;
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
    margin-top: 3rem;
    min-width: 20rem;
    max-width: 20vw;
    margin-bottom: -2rem;
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
  // attempt authentication
  $user = fetchUserByUsername($username);

  if (!$user) {
    return invalidLogin();
  }

  // Fetch most recent Password UserHash
  $userHash = fetchLastUserHash(
    $user->ID,
    UserHash::$PASSWORD_TYPE
  );

  // Verify input password matches most recent Password UserHash
  $verified = $userHash->verify($password);

  if (!$verified) {
    invalidLogin();
    return;
  }

  validLogin($user);
}

/**
 * Invalid Login
 * 
 * Handle an invalid login.
 * 
 * @return void
 */
function invalidLogin () {
  $_SESSION['user'] = null;
  $_SESSION['is_logged_in'] = false;

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
  $_SESSION['user'] = array(
    'ID' => $user->ID,
    'Username' => $user->Username,
    'Name' => $user->Name,
    'IsSuperAdmin' => $user->IsSuperAdmin
  );
  $_SESSION['is_logged_in'] = true;

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
