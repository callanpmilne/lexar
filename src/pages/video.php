<?php
/**
 * View Video Page
 */

$pathParts = explode('/', substr(REQUEST_URI, 1));
$VideoID = array_slice($pathParts, -1)[0];

?>

<main>

  <div id="PageTitle">
    <h1>View Video</h1>

    <p class="breadcrumbs">
      <a href="#" onClick="window.history.go(-1)">
        &larr; Back
      </a>
    </p>
  </div>

  <p>
    Video ID (<?=$VideoID?>)
  </p>
</main>
