<?php

/**
 * Handle Route
 * 
 * Load the page that matches the first part of the REQUEST_URI
 * 
 * @param string $requestUri The full Request URI
 */
function handleRoute ($requestUri) {
  $route = preg_split('/\//', $requestUri)[1];

  switch ($route) {
    case 'login':
      loadPage('user/auth');
      break;
    
    case '': 
      loadPage('home');
      break;

    default:
      http_response_code(404);
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
