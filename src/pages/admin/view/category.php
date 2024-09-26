<?php

/**
 * Category
 * 
 * Shows a single Category
 */

require_once('../src/class/Category.php');
require_once('../src/methods/Category/fetchCategory.php');

$pathParts = explode('/', substr(REQUEST_URI, 1));
$CategoryID = array_slice($pathParts, -1)[0];

$category = fetchCategory($CategoryID);

?>

<main>
  <h1>Category: <?=$category->Name?></h1>

  <p>
    <a href="/admin/list/categories">
      &larr; Return to Category List
    </a>
  </p>

  <ul>
    <?php if ($category->isNested()) : ?>
      <li>
        <span class="label">Parent ID:</span>
        <a href="/admin/view/category/<?=$category->ParentID?>">
          <?=$category->ParentID?>
        </a>
      </li>
    <?php endif; ?>

    <li>
      <span class="label">ID:</span>
      <?=$category->ID?>
    </li>

    <li>
      <span class="label">Path:</span>
      <a href="/categories/<?=$category->Path?>">
        /categories/<?=$category->Path?>
      </a>
    </li>

    <li>
      <span class="label">Name:</span>
      <?=$category->Name?>
    </li>
  </ul>
</main>
