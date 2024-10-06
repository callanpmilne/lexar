<?php
/**
 * View Picture Page
 */

$pathParts = explode('/', substr(REQUEST_URI, 1));
$PicID = array_slice($pathParts, -1)[0];

?>

<main>
  <h1>View Pic</h1>
  <p>
    Pic ID (<?=$PicID?>)
  </p>
</main>
