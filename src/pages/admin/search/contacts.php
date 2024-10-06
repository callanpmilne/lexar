<?php

require_once('../src/common/input/search.php');

/**
 * Search Contacts Page
 */

$isContactSearchSubmit = 
  array_key_exists('is_contact_search_submit', $_POST)
    && '1' === $_POST['is_contact_search_submit'];

if ($isContactSearchSubmit) {
  // handle search
}

$initialValue = array_key_exists('query', $_POST) ? $_POST['query'] : '';

?>

<main>
  <div id="PageTitle">
    <h1>Search Contact Details</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        ← Admin Dashboard
      </a>
    </p>
  </div>

  <form 
    action="/admin/search/contacts" 
    method="POST">
    <div 
      class="component-form">

      <?php searchField('Contact Detail Search', 'query', $initialValue); ?>

      <div
        class="component-form-buttons">

        <div style="display: flex; flex: 1;"></div>

        <button
          type="submit">
          Search
        </button>

        <input
          name="is_contact_search_submit"
          type="hidden"
          value="1" />
      </div>
    </div>
  </form>

  <?php if ($isContactSearchSubmit) : ?>
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
  