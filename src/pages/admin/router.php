<?php

/**
 * Admin Router
 */
$routes = array(

  '/^\/admin$/i' => 'home',

  '/^\/admin\/search\/customers$/i' => 'search/customers',
  '/^\/admin\/create\/customer$/i' => 'create/customer',
  '/^\/admin\/list\/customers$/i'  => 'list/customers',
  '/^\/admin\/view\/customer/i' => 'view/customer',

  '/^\/admin\/search\/orgs$/i' => 'search/org',
  '/^\/admin\/create\/org$/i' => 'create/org',
  '/^\/admin\/list\/orgs$/i'  => 'list/orgs',
  '/^\/admin\/view\/org/i' => 'view/org',

  '/^\/admin\/search\/categories$/i' => 'search/categories',
  '/^\/admin\/create\/category$/i' => 'create/category',
  '/^\/admin\/list\/categories$/i'  => 'list/categories',
  '/^\/admin\/view\/category/i' => 'view/category',

  '/^\/admin\/search\/users$/i' => 'search/users',
  '/^\/admin\/create\/user$/i' => 'create/user',
  '/^\/admin\/list\/users$/i'  => 'list/users',
  '/^\/admin\/view\/user/i' => 'view/user',
  
  '/^\/admin\/search\/contacts$/i'  => 'search/contacts',
  '/^\/admin\/create\/contact$/i'  => 'create/contact',
  '/^\/admin\/list\/contacts$/i'  => 'list/contacts',

  '/^\/admin\/search\/interactions$/i'  => 'search/interactions',
  '/^\/admin\/create\/interaction$/i'  => 'create/interaction',
  '/^\/admin\/list\/interactions$/i'  => 'list/interactions',

  '/^\/admin\/search\/metadata$/i'  => 'search/metadata',
  '/^\/admin\/create\/metadata$/i'  => 'create/metadata',
  '/^\/admin\/list\/metadata$/i'  => 'list/metadata',

  '/^\/admin\/search\/notes$/i'  => 'search/notes',
  '/^\/admin\/create\/note$/i'  => 'create/note',
  '/^\/admin\/list\/notes$/i'  => 'list/notes',
  '/^\/admin\/view\/note\//i'  => 'view/note',

  '/^\/admin\/search\/payments$/i'  => 'search/payments',
  '/^\/admin\/create\/payment$/i'  => 'create/payment',
  '/^\/admin\/list\/payments$/i'  => 'list/payments',
  '/^\/admin\/view\/payment\//i'  => 'view/payment',

  '/^\/admin\/search\/types$/i'  => 'search/types',
  '/^\/admin\/create\/type$/i'  => 'create/type',
  '/^\/admin\/list\/types$/i'  => 'list/types',

  '/^\/admin\/search\/entities$/i'             => 'search/entities',
  '/^\/admin\/create\/entity$/i'               => 'create/entity',
  '/^\/admin\/list\/entities$/i'               => 'list/entities',
  '/^\/admin\/view\/entity\//i'                => 'view/entity',

  '/^\/admin\/search\/entity\/types$/i'        => 'search/entity/types',
  '/^\/admin\/create\/entity\/type$/i'         => 'create/entity/type',
  '/^\/admin\/list\/entity\/types$/i'          => 'list/entity/types',
  '/^\/admin\/view\/entity\/type\//i'          => 'view/entity/type',

  '/^\/admin\/search\/entity\/attributes$/i'   => 'search/entity/attributes',
  '/^\/admin\/create\/entity\/attribute$/i'    => 'create/entity/attribute',
  '/^\/admin\/list\/entity\/attributes$/i'     => 'list/entity/attributes',
  '/^\/admin\/view\/entity\/attribute\//i'     => 'view/entity/attribute',
  
  '/^\/admin\/tools\/api\/builder$/i'          => 'tools/api/builder',
  '/^\/admin\/tools\/code\/writer$/i'          => 'tools/code/writer',
  '/^\/admin\/tools\/entity\/manager$/i'       => 'tools/entity/manager',
  '/^\/admin\/tools\/portal\/builder$/i'       => 'tools/portal/builder',

  '/^\/admin\/tools\/password\/generator$/i'   => 'tools/password/generator',
  '/^\/admin\/tools\/password\/hasher$/i'      => 'tools/password/hasher',
  '/^\/admin\/tools\/timestamp\/converter$/i'  => 'tools/timestamp/converter',
  '/^\/admin\/tools\/uuid\/generator$/i'       => 'tools/uuid/generator',

);

foreach ($routes as $pattern => $includePath) {
  if (!preg_match($pattern, REQUEST_URI)) {
    continue;
  }

  require( '../src/pages/admin/' . $includePath . '.php' );
}
