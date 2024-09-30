<?php

require_once('../src/methods/User/fetchUser.php');
require_once('../src/methods/User/fetchUserHash.php');

/**
 * User Logout Page
 */

$isLoggedIn = array_key_exists('is_logged_in', $_SESSION) && true === $_SESSION['is_logged_in'];

if (!$isLoggedIn) {
  inlineRedirect('/');
}

session_destroy();
inlineRedirect('/logout/success');
