<?php

/** 
 * Lexar Twenty Four
 * Copyright (c) 2024
 */

/**
 * Configuration File
 */
require_once( '../config.inc.php' );

/**
 * Utility Functions
 */
require_once( '../src/methods/util.php' );

/**
 * Initialise DB
 */
$GLOBALS['dbh'] = pg_connect( POSTGRES_DB_CONN_STRING );

/**
 * Global Session
 */
require_once( '../src/GlobalSession.php' );

/**
 * Router requires relevant sources
 */
require_once( '../src/router.php' );

// Patterns to exclude from router
define( 'SKIP_PATTERNS', '/\.(?:png|jpg|jpeg|gif|css|js|webm|mov|m4v|ogg|mp4)$/' );

// HTTP Request URI
define( 'REQUEST_URI', $_SERVER["REQUEST_URI"] );

/**
 * Router
 */
if ( preg_match( SKIP_PATTERNS, REQUEST_URI ) ) {
  return false; // serve the requested resource as-is.
}

handleRoute( REQUEST_URI );
