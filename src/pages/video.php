<?php
/**
 * View Video Page
 */

$pathParts = explode('/', substr(REQUEST_URI, 1));
$VideoID = array_slice($pathParts, -1)[0];

?>

<main>
  <h1>View Video</h1>
  <p>
    Video ID (<?=$VideoID?>)
  </p>
</main>
