<?php

/**
 * Type List
 * 
 * Shows a list of Types
 */

require_once('../src/class/Entities/Detailed/EntityType.php');
require_once('../src/methods/Entity/fetchEntityTypeList.php');

$types = fetchEntityTypeList();

?>

<main>
  <div id="PageTitle">
    <h1>Entity Types</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <table>
    <thead>
      <tr>
        <th class="wide">Label</th>
        <th>Name</th>
        <th>Parent</th>
        <th>Abstract</th>
        <th>Attributes</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($types as $type) : ?>
        <tr>
          <td class="wide view-link">
            <a href="/admin/view/entity/type/<?=$type->ID?>">
              <?=htmlentities($type->Label)?>
            </a>
          </td>

          <th>
            <?=$type->Name?>
          </th>

          <td><?=isset($type->ParentID) ? $type->ParentID : ''?></td>

          <td style="text-align:right;"><?=$type->IsAbstract ? 'Y' : ''?></td>

          <td style="text-align:right;">0</td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
