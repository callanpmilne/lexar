<?php

require_once('../src/methods/util.php');

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

  switch ($route) {
    case 'login':
      loadPage('user/auth');
      break;

    case 'logout':
      $isSuccess = array_key_exists(2, $routeParts) && "success" === $routeParts[2];
      if ($isSuccess) loadPage('user/logout/success');
      else loadPage('user/logout', false, false);
      break;
    
    case '': 
      loadPage('home');
      break;
    
    case 'browse': 
      // no break
    
    case 'pic': 
      loadPage('pic');
      break;
    
    case 'post': 
      loadPage('post');
      break;
    
    case 'video': 
      loadPage('video');
      break;
    
    case 'categories': 
      loadPage('categories');
      break;
    
    case 'search': 
      loadPage('search');
      break;
    
    case 'change': 
      // no break
    
    case 'update': 
      // no break
    
    case 'my': 
      userOnlyPage(); // Redirect user to the login page if they're not logged in
      loadPage('user/router');
      break;
    
    case 'admin': 
      adminOnlyPage(); // Redirect user to the login page if they're not an admin
      require('../src/pages/admin/router.php');
      break;
    
    case 'api': 
      require('../src/api/router.php');
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
function loadPage (
  string $page,
  bool $inclHeader = true,
  bool $inclFooter = true
) {

  // Load Page Header
  if (true === $inclHeader) loadPageHeader();
  
  // Load Page
  require('../src/pages/' . $page . '.php');
  
  // Load Page Footer
  if (true === $inclFooter) loadPageFooter();
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
