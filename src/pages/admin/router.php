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
  
  '/^\/admin\/create\/contact$/i'  => 'create/contact',
  '/^\/admin\/list\/contacts$/i'  => 'list/contacts',

  '/^\/admin\/create\/interaction$/i'  => 'create/interaction',
  '/^\/admin\/list\/interactions$/i'  => 'list/interactions',

  '/^\/admin\/create\/metadata$/i'  => 'create/metadata',
  '/^\/admin\/list\/metadata$/i'  => 'list/metadata',

  '/^\/admin\/create\/note$/i'  => 'create/note',
  '/^\/admin\/list\/notes$/i'  => 'list/notes',

  '/^\/admin\/create\/payment$/i'  => 'create/payment',
  '/^\/admin\/list\/payments$/i'  => 'list/payments',
  '/^\/admin\/view\/payment\//i'  => 'view/payment',

  '/^\/admin\/create\/type$/i'  => 'create/type',
  '/^\/admin\/list\/types$/i'  => 'list/types',

);

foreach ($routes as $pattern => $includePath) {
  if (!preg_match($pattern, REQUEST_URI)) {
    continue;
  }

  require( '../src/pages/admin/' . $includePath . '.php' );
}
