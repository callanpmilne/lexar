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
  <h1>Category List</h1>

  <p>
    <a href="/admin">
      &larr; Admin Dashboard
    </a>
  </p>

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
          <td>
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
