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
        <th style="text-align:left;">Name</th>
        <th style="text-align:left;">Parent</th>
        <th style="text-align:center;">Abstract</th>
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

          <td style="text-align:left;">
            <?=$type->Name?>
          </td>

          <?php if (isset($type->ParentID)) : ?>
            <td style="text-align:left;">
              <a href="/admin/view/entity/type/<?=$type->ParentID?>">
                <?=$type->ParentLabel?>
              </a>
            </td>
          <?php else : ?>
            <td></td>
          <?php endif; ?>

          <td style="text-align:center;"><?=(true === $type->IsAbstract) ? 'Y' : ''?></td>

          <td style="text-align:right;"><?=$type->AttributeCount?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
