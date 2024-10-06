<?php

require_once('../src/common/input/search.php');

/**
 * Search Metadatas Page
 */

$isMetadataSearchSubmit = 
  array_key_exists('is_metadata_search_submit', $_POST)
    && '1' === $_POST['is_metadata_search_submit'];

if ($isMetadataSearchSubmit) {
  // handle search
}

$initialValue = array_key_exists('query', $_POST) ? $_POST['query'] : '';

?>

<main>
  <div id="PageTitle">
    <h1>Search Metadata</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        ← Admin Dashboard
      </a>
    </p>
  </div>

  <form 
    action="/admin/search/metadata" 
    method="POST">
    <div 
      class="component-form">

      <?php searchField('Metadata Search', 'query', $initialValue); ?>

      <div
        class="component-form-buttons">

        <div style="display: flex; flex: 1;"></div>

        <button
          type="submit">
          Search
        </button>

        <input
          name="is_metadata_search_submit"
          type="hidden"
          value="1" />
      </div>
    </div>
  </form>

  <?php if ($isMetadataSearchSubmit) : ?>
    <div
      class="component-form-login-debug">
      <h2>Debug</h2>
      <pre><?php var_dump($_POST); ?></pre>
    </div>
  <?php endif; ?>
</main>

<style>
  div.component-form-login-debug {
    border: 1px solid;
    padding: 0 1rem 1rem;
    margin-bottom: 2rem;
  }
</style>
  