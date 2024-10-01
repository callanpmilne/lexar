<?php

require_once('../src/methods/util.php');

class GlobalSession {
  static public function init () {
    // check for cookie: 'accept_cookie_policy'
    // if set we can init session, and ...
      // check for cookie: 'session'
      // set cookie: 'session'
  }
}

/**
 * Handle Route
 * 
 * Load the page that matches the first part of the REQUEST_URI
 * 
 * @param string $requestUri The full Request URI
 */
function handleRoute (
  string $requestUri
) {

  // The URI
  $uri = preg_split('/\?/', $requestUri);

  // Query String
  $qs = array_key_exists(1, $uri) ? $uri[1] : '';
  
  // URI Parts (for routing) 
  $routeParts = preg_split('/\//', $uri[0]);

  // Top-Level Route
  $route = $routeParts[1];

  GlobalSession::init();

  switch ($route) {
    case 'login':
      loadPage('user/auth');
      break;

    case 'logout':
      $isSuccess = $routeParts[2] && "success" === $routeParts[2];
      loadPage($isSuccess ? 'user/logout/success' : 'user/logout');
      break;
    
    case '': 
      loadPage('home');
      break;
    
    case 'categories': 
      loadPage('categories');
      break;
    
    case 'admin': 
      adminOnlyPage(); // Redirect user to the login page if they're not an admin
      loadPage('admin/router');
      break;

    default:
      http_response_code(404); // 404 if no handler above
      loadPage('error/404');
  }

}

/**
 * Load Page
 * 
 * Loads a page
 * 
 * @param string $page Path to PHP file in pages source dir (excl .php extention)
 */
function loadPage ($page) {

  // Load Page Header
  loadPageHeader();
  
  // Load Page
  require('../src/pages/' . $page . '.php');
  
  // Load Page Footer
  loadPageFooter();
}

/**
 * Load Page Header
 * 
 * Adds in the common page header
 */
function loadPageHeader () {
  require('../src/common/page/header.php');
}

/**
 * Load Page Footer
 * 
 * Adds in the common page footer
 */
function loadPageFooter () {
  require('../src/common/page/footer.php');
}
