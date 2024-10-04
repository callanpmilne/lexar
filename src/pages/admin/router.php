<?php

/**
 * Admin Router
 */
$routes = array(

  '/^\/admin$/i' => 'home',

  '/^\/admin\/create\/customer$/i' => 'create/customer',
  '/^\/admin\/list\/customers$/i'  => 'list/customers',
  '/^\/admin\/view\/customer/i' => 'view/customer',

  '/^\/admin\/create\/org$/i' => 'create/org',
  '/^\/admin\/list\/orgs$/i'  => 'list/orgs',
  '/^\/admin\/view\/org/i' => 'view/org',

  '/^\/admin\/create\/category$/i' => 'create/category',
  '/^\/admin\/list\/categories$/i'  => 'list/categories',
  '/^\/admin\/view\/category/i' => 'view/category',

  '/^\/admin\/create\/user$/i' => 'create/user',
  '/^\/admin\/list\/users$/i'  => 'list/users',
  '/^\/admin\/view\/user/i' => 'view/user',
  
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

  '/^\/admin\/tools\/password\/generator$/i'  => 'tools/password/generator',
  '/^\/admin\/tools\/password\/hasher$/i'  => 'tools/password/hasher',
  '/^\/admin\/tools\/timestamp\/converter$/i'  => 'tools/timestamp/converter',
  '/^\/admin\/tools\/uuid\/generator$/i'  => 'tools/uuid/generator',
  '/^\/admin\/tools\/code\/writer$/i'  => 'tools/code/writer',

);

foreach ($routes as $pattern => $includePath) {
  if (!preg_match($pattern, REQUEST_URI)) {
    continue;
  }

  require( '../src/pages/admin/' . $includePath . '.php' );
}
