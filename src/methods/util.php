<?php

/**
 * Numerical Array
 * @param mixed $inputArr A single item, Associative Array, or Numerical Array
 * @return array Numerical Array
 */
function numericalArray (
  mixed $inputArr
): array {
  $outputArr = [...$inputArr];
  $keys = array_keys($outputArr);

  if ($keys != array_keys($keys)) {
    $outputArr = array_values($outputArr);
  }

  return $outputArr;
}

/**
 * Get Content ID
 * @return string Last Part of the route (the Content ID if this is a content view)
 */
function getContentID(
  // no args
): string {
  $pathParts = explode('/', substr(REQUEST_URI, 1));
  return array_slice($pathParts, -1)[0];
}

/**
 * Is Logged In
 * 
 * @return bool TRUE if the current visitor is logged in
 */
function isLoggedIn () {
  return GlobalSession::getGlobalSession()->getSession()->isLoggedIn();
}

/**
 * Is Super Admin
 * 
 * @return bool TRUE if the current visitor is an admin
 */
function isSuperAdmin () {
  if (!isLoggedIn()) {
    return false;
  }

  return GlobalSession::getGlobalSession()->getUser()->IsSuperAdmin;
}

/**
 * User Only Page
 * 
 * Redirect a visitor to the homepage if they are not an admin
 * 
 * @param bool $inline Use inline JavaScript to redirect the user?
 * @return void
 */
function userOnlyPage (
  bool $inline = false
) {
  if (isLoggedIn()) {
    return; // User is logged in
  }

  if (true === $inline) {
    inlineRedirect('/');
    return;
  }

  httpRedirect('/');
}

/**
 * Admin Only Page
 * 
 * Redirect a visitor to the homepage if they are not an admin
 * 
 * @param bool $inline Use inline JavaScript to redirect the user?
 * @return void
 */
function adminOnlyPage (
  bool $inline = false
) {
  $redirectTarget = '/login?redirect=' . urlencode($_SERVER['REQUEST_URI']);
  
  if (isSuperAdmin()) {
    return; // User is admin
  }

  if (true === $inline) {
    inlineRedirect($redirectTarget);
    return;
  }

  httpRedirect($redirectTarget);
}

/**
 * Inline Redirect
 * 
 * Redirect a user by way of an inline JavaScript script.
 * 
 * @param string $dest URL for redirection
 * @return void
 */
function inlineRedirect (
  string $dest
) {
  ?>
  <script>"use strict"; (function (w) {
    w.location.assign('<?=$dest?>');
  })(window);</script>
  <?php
  exit(0);
}

/**
 * HTTP Redirect
 * 
 * Redirect a user by way of setting the HTTP Location Header.
 * 
 * @param string $dest URL for redirection
 */
function httpRedirect (
  string $dest
) {
  header('Location: ' . $dest);
}
