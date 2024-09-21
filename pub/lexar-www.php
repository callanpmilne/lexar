<?php

/** 
 * Lexar Twenty Four
 * Copyright (c) 2024
 */

/**
 * Router requires relevant sources
 */
require_once( '../src/router.php' );

// Patterns to exclude from router
define( 'SKIP_PATTERNS', '/\.(?:png|jpg|jpeg|gif|css|js)$/' );

// HTTP Request URI
define( 'REQUEST_URI', $_SERVER["REQUEST_URI"] );

/**
 * Router
 */
if ( preg_match( SKIP_PATTERNS, REQUEST_URI ) ) {
  return false; // serve the requested resource as-is.
}

handleRoute( REQUEST_URI );
