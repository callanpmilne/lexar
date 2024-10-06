<?php

/**
 * API Router
 */
$routes = array(
  '/\/status$/i' => ['GET', 'getStatus'],
  '/\/categories.json$/i' => ['GET', 'getCategories.json'],
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
}
