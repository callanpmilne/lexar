<?php

/**
 * View Entity Type Page
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
    <h1>Type: <?=$type->Label?></h1>

    <p>
      <a href="/admin/list/entity/types">
        &larr; Return to Type List
      </a>
    </p>
  </div>

  <ul>
    <?php if (isset($type->ParentID)) : ?>
      <li>
        <span class="label">Inherits From:</span>
        <a href="/admin/view/entity/type/<?=$type->ParentID?>">
          <?=$type->ParentID?>
        </a>
      </li>
    <?php endif; ?>

    <li>
      <span class="label">ID:</span>
      <?=$type->ID?>
    </li>

    <li>
      <span class="label">Name:</span>
      <?=$type->Name?>
    </li>

    <li>
      <span class="label">Abstract:</span>
      <?=(true === $type->IsAbstract ? 'true' : 'false')?>
    </li>
  </ul>
</main>
