<?php

/**
 * Entity List
 * 
 * Shows a list of Entity
 */

require_once('../src/class/Entity.php');
require_once('../src/methods/Entity/fetchEntityList.php');

$entity = fetchEntityList();

?>

<main>
  <div id="PageTitle">
    <h1>Entity List</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        ← Admin Dashboard
      </a>
    </p>
  </div>

  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Path</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($entity as $entity) : ?>
        <tr>
          <td class="view-link">
            <a href="/admin/view/entity/<?=$entity->ID?>">
              <?=$entity->Name?>
            </a>
          </td>

          <td>
            /<?=$entity->Path?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>