<?php

require_once('../src/class/Entities/Entity.php');
require_once('../src/methods/Entity/createEntityType.php');
require_once('../src/methods/Entity/createEntityName.php');

/**
 * Create Entity Page
 */

$isCreateEntityTypeSubmit = 
  array_key_exists('is_create_entity_type_submit', $_POST)
    && '1' === $_POST['is_create_entity_type_submit'];

if ($isCreateEntityTypeSubmit) {
  
  // Entity Type ID
  $entityTypeID = $_POST['uuid'];
  
  // Parent Entity Type ID
  $parentID = array_key_exists('parentEntityID', $_POST)
    ? $_POST['parentEntityID']
    : null;

  // Entity Name ID
  $entityNameID = $_POST['nameID'];

  // Entity Normal Display Name (Label)
  $label = $_POST['label'];

  // Entity 'Nice' Name
  $niceName = $_POST['niceName'];

  // Entity PascalCase Name
  $pascalCaseName = $_POST['pascalCaseName'];

  // Entity Camel Case Name
  $camelCaseName = $_POST['camelCaseName'];

  // Entity Snake Case Name
  $snakeCaseName = $_POST['snakeCaseName'];

  // Plural Replacements
  $pluralReplacements = $_POST['pluralReplacements'];

  // Is Abstract Type?
  $isAbstractType = array_key_exists('isAbstractType', $_POST)
    ? '1' === $_POST['isAbstractType']
    : false;

  // attempt to create entity
  $createTypeResult = createEntityType(new EntityType(
    $entityTypeID,
    $entityNameID,
    $isAbstractType,
    $parentID ?? null
  ));

  // attempt to create entity name
  $createNameResult = createEntityName(new EntityName(
    $entityNameID,
    $label,
    $niceName,
    $pascalCaseName,
    $camelCaseName,
    $snakeCaseName,
    $pluralReplacements
  ));

  if (false === $createTypeResult) {
    return;
  }

  if (false === $createNameResult) {
    return;
  }

  // redirect user to entity admin page on successful creation
  ?>
  <script>"use strict"; (function (w) {
    const entityTypeURI = '/admin/view/entity/type/<?=$entityTypeID?>';
    w.location.assign(entityTypeURI);
  })(window);</script>
  <?php
  exit(0);

}
?>

<main>
  <div id="PageTitle">
    <h1>Create Entity Type</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <form 
    action="/admin/create/entity/type" 
    method="POST">
    <?php include('../src/common/form/create/entity/type.php'); ?>
  </form>

  <?php if ($isCreateEntityTypeSubmit) : ?>
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