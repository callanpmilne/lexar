<?php

/**
 * API Router
 */
$routes = array(
  '/\/status$/i' => ['GET', 'getStatus'],
);

foreach ($routes as $pattern => $includePath) {
  if (!preg_match($pattern, REQUEST_URI)) {
    continue;
  }
  
  if ($includePath[0] !== strtoupper($_SERVER['REQUEST_METHOD'])) {
    continue;
  }

  require( '../src/api/ops/' . $includePath[1] . '.php' );
}
