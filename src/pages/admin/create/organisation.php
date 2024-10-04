<?php

require_once('../src/class/Organisation.php');
require_once('../src/methods/Organisation/createOrganisation.php');

/**
 * Create Organisation Page
 */

$isCreateOrganisationSubmit = 
  array_key_exists('is_create_organisation_submit', $_POST)
    && '1' === $_POST['is_create_organisation_submit'];

if ($isCreateOrganisationSubmit) {
  
  // Organisation ID
  $organisationID = $_POST['uuid'];

  // Organisation Name
  $organisationName = $_POST['organisationName'];

  // attempt to create organisation  
  $result = createOrganisation(new Organisation(
    $organisationID,
    $organisationName
  ));

  // redirect user to organisation admin page on successful creation
  if (true === $result) {
    ?>
    <script>"use strict"; (function (w) {
      const organisationURI = '/admin/view/organisation/<?=$organisationID?>';
      w.location.assign(organisationURI);
    })(window);</script>
    <?php
    exit(1);
  }

}
?>

<main>
  <div id="PageTitle">
    <h1>Create Organisation</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        ← Admin Dashboard
      </a>
    </p>
  </div>

  <form 
    action="/admin/create/organisation" 
    method="POST">
    <?php include('../src/components/forms/create/organisation.php'); ?>
  </form>

  <?php if ($isCreateOrganisationSubmit) : ?>
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
  