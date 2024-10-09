<?php

/**
 * Admin Router
 */
$routes = array(

  '/^\/admin$/i' => 'home',

  // Customers
  '/^\/admin\/search\/customers$/i' => 'search/customers',
  '/^\/admin\/create\/customer$/i' => 'create/customer',
  '/^\/admin\/list\/customers$/i'  => 'list/customers',
  '/^\/admin\/view\/customer/i' => 'view/customer',

  // Orgs
  '/^\/admin\/search\/orgs$/i' => 'search/org',
  '/^\/admin\/create\/org$/i' => 'create/org',
  '/^\/admin\/list\/orgs$/i'  => 'list/orgs',
  '/^\/admin\/view\/org/i' => 'view/org',

  // Categories
  '/^\/admin\/search\/categories$/i' => 'search/categories',
  '/^\/admin\/create\/category$/i' => 'create/category',
  '/^\/admin\/list\/categories$/i'  => 'list/categories',
  '/^\/admin\/view\/category/i' => 'view/category',

  // Users
  '/^\/admin\/search\/users$/i' => 'search/users',
  '/^\/admin\/create\/user$/i' => 'create/user',
  '/^\/admin\/list\/users$/i'  => 'list/users',
  '/^\/admin\/view\/user/i' => 'view/user',
  
  // Contacts
  '/^\/admin\/search\/contacts$/i'  => 'search/contacts',
  '/^\/admin\/create\/contact$/i'  => 'create/contact',
  '/^\/admin\/list\/contacts$/i'  => 'list/contacts',

  // Interactions
  '/^\/admin\/search\/interactions$/i'  => 'search/interactions',
  '/^\/admin\/create\/interaction$/i'  => 'create/interaction',
  '/^\/admin\/list\/interactions$/i'  => 'list/interactions',

  // Metadata
  '/^\/admin\/search\/metadata$/i'  => 'search/metadata',
  '/^\/admin\/create\/metadata$/i'  => 'create/metadata',
  '/^\/admin\/list\/metadata$/i'  => 'list/metadata',

  // Notes
  '/^\/admin\/search\/notes$/i'  => 'search/notes',
  '/^\/admin\/create\/note$/i'  => 'create/note',
  '/^\/admin\/list\/notes$/i'  => 'list/notes',
  '/^\/admin\/view\/note\//i'  => 'view/note',

  // Payments
  '/^\/admin\/search\/payments$/i'  => 'search/payments',
  '/^\/admin\/create\/payment$/i'  => 'create/payment',
  '/^\/admin\/list\/payments$/i'  => 'list/payments',
  '/^\/admin\/view\/payment\//i'  => 'view/payment',

  // Entities
  '/^\/admin\/search\/entities$/i'             => 'search/entities',
  '/^\/admin\/create\/entity$/i'               => 'create/entity',
  '/^\/admin\/list\/entities$/i'               => 'list/entities',
  '/^\/admin\/view\/entity\//i'                => 'view/entity',

  // Types
  '/^\/admin\/search\/entity\/types$/i'        => 'search/entity/types',
  '/^\/admin\/create\/entity\/type$/i'         => 'create/entity/type',
  '/^\/admin\/list\/entity\/types$/i'          => 'list/entity/types',
  '/^\/admin\/view\/entity\/type\//i'          => 'view/entity/type',

  // Type Attributes
  '/^\/admin\/search\/entity\/type\/attributes$/i'   => 'search/entity/type/attributes',
  '/^\/admin\/create\/entity\/type\/attribute$/i'    => 'create/entity/type/attribute',
  '/^\/admin\/list\/entity\/type\/attributes$/i'     => 'list/entity/type/attributes',
  '/^\/admin\/view\/entity\/type\/attribute\//i'     => 'view/entity/type/attribute',
  
  // Admin Tools
  '/^\/admin\/tools\/api\/builder$/i'          => 'tools/api/builder',
  '/^\/admin\/tools\/code\/writer$/i'          => 'tools/code/writer',
  '/^\/admin\/tools\/entity\/manager$/i'       => 'tools/entity/manager',
  '/^\/admin\/tools\/portal\/builder$/i'       => 'tools/portal/builder',

  // Admin Tools
  '/^\/admin\/tools\/password\/generator$/i'   => 'tools/password/generator',
  '/^\/admin\/tools\/password\/hasher$/i'      => 'tools/password/hasher',
  '/^\/admin\/tools\/timestamp\/converter$/i'  => 'tools/timestamp/converter',
  '/^\/admin\/tools\/uuid\/generator$/i'       => 'tools/uuid/generator',

);

foreach ($routes as $pattern => $includePath) {
  if (substr(REQUEST_URI, -1) == '/') {
    $redirect = substr(REQUEST_URI, 0, -1);     // If the REQUEST_URI has a trailing slash
    header(sprintf("Location: %s", $redirect)); // Redirect the user to the same route without
    exit(1);                                    // the trailing slash
  }

  if (!preg_match($pattern, REQUEST_URI)) {
    continue;
  }

  // Load Page Header
  require('../src/common/page/header.php');
  
  // Load Page
  require( '../src/pages/admin/' . $includePath . '.php' );
  
  // Load Page Footer
  require('../src/common/page/footer.php');
}
