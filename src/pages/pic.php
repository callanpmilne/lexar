<?php
/**
 * View Picture Page
 */

$pathParts = explode('/', substr(REQUEST_URI, 1));
$PicID = array_slice($pathParts, -1)[0];

?>

<main>
  <div id="PageTitle">
    <h1>View Pic</h1>

    <p class="breadcrumbs">
      <a href="#" onClick="window.history.go(-1)">
        &larr; Back
      </a>
    </p>
  </div>

  <p>
    Pic ID (<?=$PicID?>)
  </p>
</main>
