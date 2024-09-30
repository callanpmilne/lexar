<?php

function isLoggedIn () {
  return in_array('is_logged_in', $_SESSION)
    && true === $_SESSION['is_logged_in'];
}

function isSuperAdmin () {
  if (!isLoggedIn()) {
    return false;
  }

  return in_array('user', $_SESSION)
    && true === $_SESSION['user']['IsSuperAdmin'];
}

function checkAuthorization () {
  
}

function adminOnlyPage () {
  $isAdmin = !isSuperAdmin();
  if ($isAdmin) {
    return; // User is admin
  }

  inlineRedirect('/');
}

/**
 * Inline Redirect
 * 
 * Redirect a user by way of an inline JavaScript script.
 * 
 * @param string $dest URL for redirection
 * @return void
 */
function inlineRedirect ($dest) {
  ?>
  <script>"use strict"; (function (w) {
    w.location.assign('<?=$dest?>');
  })(window);</script>
  <?php
  exit(1);
}
