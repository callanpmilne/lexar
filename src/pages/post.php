<?php
/**
 * View Post Page
 */

$pathParts = explode('/', substr(REQUEST_URI, 1));
$PostID = array_slice($pathParts, -1)[0];

?>

<main>
  <h1>View Post</h1>
  <p>
    Post ID (<?=$PostID?>)
  </p>
</main>
