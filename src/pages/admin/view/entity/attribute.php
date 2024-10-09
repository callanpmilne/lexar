<?php

/**
 * View Entity Attribute Page
 * 
 * Shows a single Entity Type
 */

require_once('../src/class/Entities/Detailed/EntityType.php');
require_once('../src/methods/Entity/fetchEntityType.php');

$pathParts = explode('/', substr(REQUEST_URI, 1));
$TypeID = array_slice($pathParts, -1)[0];

$type = fetchEntityType($TypeID);

?>

<main>
  <div id="PageTitle">
    <h1>Type: <?=$type->Name?></h1>

    <p>
      <a href="/admin/list/categories">
        &larr; Return to Type List
      </a>
    </p>
  </div>

  <ul>
    <?php if ($type->isNested()) : ?>
      <li>
        <span class="label">Parent ID:</span>
        <a href="/admin/view/type/<?=$type->ParentID?>">
          <?=$type->ParentID?>
        </a>
      </li>
    <?php endif; ?>

    <li>
      <span class="label">ID:</span>
      <?=$type->ID?>
    </li>

    <li>
      <span class="label">Path:</span>
      <a href="/categories/<?=$type->Path?>">
        /categories/<?=$type->Path?>
      </a>
    </li>

    <li>
      <span class="label">Name:</span>
      <?=$type->Name?>
    </li>
  </ul>
</main>
