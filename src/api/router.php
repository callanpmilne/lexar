<?php

define("HTTP_GET", "GET");
define("HTTP_POST", "POST");
define("HTTP_PUT", "PUT");
define("HTTP_PATCH", "PATCH");
define("HTTP_DELETE", "DELETE");

/**
 * API Router
 */
$routes = array(
  // API Status
  '/\/status$/i' => 
    [HTTP_GET, 'getStatus'],
  
  // Categories
  '/\/categories.json(|\?.+)$/i' => 
    [HTTP_GET, 'getCategories.json'],
  
  // Customers
  '/\/customers.json(|\?.+)$/i' => 
    [HTTP_GET, 'getCustomers.json'],
  
  // Orgs
  '/\/orgs.json(|\?.+)$/i' => 
    [HTTP_GET, 'getOrgs.json'],
  
  // Accounts
  '/\/accounts.json(|\?.+)$/i' => 
    [HTTP_GET, 'getAccounts.json'],
);

foreach ($routes as $pattern => $includePath) {
  if (!preg_match($pattern, REQUEST_URI)) {
    continue;
  }
  
  if ($includePath[0] !== strtoupper($_SERVER['REQUEST_METHOD'])) {
    continue;
  }

  try {
    require( '../src/api/ops/' . $includePath[1] . '.php' );
  }
  catch (Exception $e) {
    // Set JSON Content-Type
    header("Content-Type: application/json;charset=utf8");
    
    // Internal server error if not already caught
    http_response_code(500);

    // JSON Response
    print json_encode(
      ["ErrorMessage" => DEBUG_API ? $e->getMessage() : 'Internal Server Error']
    );
  }

  // That is all
  exit(0);
}

/**
 * If we reached here: there was no matching route, send a 404 response code.
 */

// Set JSON Content-Type
header("Content-Type: application/json;charset=utf8");

// Send 404 Response
http_response_code(404);

// JSON Response
print json_encode(
  ["ErrorMessage" => sprintf('Resource "%s" not found', REQUEST_URI)]
);