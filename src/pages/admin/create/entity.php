<?php

require_once('../src/class/Entities/Entity.php');
require_once('../src/methods/Entity/createEntity.php');

/**
 * Create Entity Page
 */

$isCreateEntitySubmit = 
  array_key_exists('is_create_entity_submit', $_POST)
    && '1' === $_POST['is_create_entity_submit'];

if ($isCreateEntitySubmit) {
  
  // Entity ID
  $entityID = $_POST['uuid'];

  // Entity Name
  $entityName = $_POST['entityName'];

  // attempt to create entity
  $result = createEntity(new Entity(
    $entityID,
    $entityName
  ));

  // redirect user to entity admin page on successful creation
  if (true === $result) {
    ?>
    <script>"use strict"; (function (w) {
      const entityURI = '/admin/view/entity/<?=$entityID?>';
      w.location.assign(entityURI);
    })(window);</script>
    <?php
    exit(0);
  }

}
?>

<main>
  <div id="PageTitle">
    <h1>Create Entity</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <form 
    action="/admin/create/entity" 
    method="POST">
    <?php include('../src/common/form/create/entity.php'); ?>
  </form>

  <?php if ($isCreateEntitySubmit) : ?>
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