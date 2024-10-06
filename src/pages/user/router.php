<?php

/**
 * User Router
 */
$routes = array(
  '/^\/my\/wishlist$/i'     => 'my/wishlist',
  '/^\/my\/profile$/i'      => 'my/profile',
  '/^\/my\/saved$/i'        => 'my/saved',
  '/^\/my\/payments$/i'     => 'my/payments',
  '/^\/my\/transactions$/i' => 'my/transactions',
  '/^\/my\/orders$/i'       => 'my/orders',
  '/^\/my\/settings$/i'     => 'my/settings',
  '/^\/my\/files$/i'        => 'my/files',
  '/^\/my\/account$/i'      => 'my/account',
  
  '/^\/change\/password$/i' => 'change/password',
  '/^\/update\/contact$/i'  => 'update/contact',
);

foreach ($routes as $pattern => $includePath) {
  if (!preg_match($pattern, REQUEST_URI)) {
    continue;
  }

  require( '../src/pages/user/' . $includePath . '.php' );
}
