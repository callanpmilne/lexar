<?php

/**
 * Category List
 * 
 * Shows a list of Categories
 */

require_once('../src/class/Category.php');
require_once('../src/methods/Category/fetchCategoryList.php');

$categories = fetchCategoryList();

?>

<main>
  <div id="PageTitle">
    <h1>Category List</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
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
      <?php foreach ($categories as $category) : ?>
        <tr>
          <td class="view-link">
            <a href="/admin/view/category/<?=$category->ID?>">
              <?=$category->Name?>
            </a>
          </td>

          <td>
            /<?=$category->Path?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
