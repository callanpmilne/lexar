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
    <h1>
      <?=$type->Label?>
      <span>Entity Type</span>
    </h1>

    <p>
      <a href="/admin/list/entity/types">
        &larr; Return to Type List
      </a>
    </p>
  </div>

  <section id="EntityTypeDetail">
    <h2>Entity Type</h2>
    
    <ul>
      <?php if (isset($type->ParentID)) : ?>
        <li>
          <span class="label">Parent:</span>
          <a href="/admin/view/entity/type/<?=$type->ParentID?>">
            <?=$type->ParentLabel?>
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
  </section>
</main>

<style>
  #EntityTypeDetail {
    backdrop-filter: brightness(0.5);
    border-radius: 0.5rem;
    overflow: hidden;
  }
  #EntityTypeDetail h2, 
  #EntityTypeDetail h3,
  #EntityTypeDetail ul {
    padding: 1rem 1.5rem 0;
  }
  #EntityTypeDetail h2, 
  #EntityTypeDetail h3 {
    font-size: 1.2rem;
    margin-top: 0;
  }
  #EntityTypeDetial h2 {
    padding: 1rem 1.5rem;
  }
  #EntityTypeDetail h3 {
    margin-top: 0;
  }
  #EntityTypeDetail h1 span {
    color: var(--color);
  }
  
  #EntityTypeDetail ul {
    list-style-type: none;
    border-top: 1px solid;
    font-size: 0.9rem;
    line-height: 2;
  }
</style>