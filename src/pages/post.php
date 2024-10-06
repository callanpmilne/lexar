<?php
/**
 * View Post Page
 */

$pathParts = explode('/', substr(REQUEST_URI, 1));
$PostID = array_slice($pathParts, -1)[0];

?>

<main>
  <div id="PageTitle">
    <h1>View Post</h1>

    <p class="breadcrumbs">
      <a href="#" onClick="window.history.go(-1)">
        &larr; Back
      </a>
    </p>
  </div>

  <p>
    Post ID (<?=$PostID?>)
  </p>
</main>
