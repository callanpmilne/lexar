<?php

/**
 * Admin Router
 */
$routes = array(
  
  '/^\/admin$/i' => 'home',

  '/^\/admin\/create\/customer$/i' => 'create/customer',
  '/^\/admin\/list\/customers$/i'  => 'list/customers',
  '/^\/admin\/view\/customer/i' => 'view/customer',

  '/^\/admin\/create\/category$/i' => 'create/category',
  '/^\/admin\/list\/categories$/i'  => 'list/categories',
  '/^\/admin\/view\/category/i' => 'view/category',
  
  '/^\/admin\/list\/contacts$/i'  => 'list/contacts',

  '/^\/admin\/list\/interactions$/i'  => 'list/interactions',

  '/^\/admin\/list\/metadata$/i'  => 'list/metadata',

  '/^\/admin\/list\/notes$/i'  => 'list/notes',

  '/^\/admin\/list\/payments$/i'  => 'list/payments',

  '/^\/admin\/list\/types$/i'  => 'list/types',

);

foreach ($routes as $pattern => $includePath) {
  if (!preg_match($pattern, REQUEST_URI)) {
    continue;
  }

  require( '../src/pages/admin/' . $includePath . '.php' );
}
