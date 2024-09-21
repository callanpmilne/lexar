<?php
/**
 * Categories Page
 * 
 * Shows a list of Categories
 */

require_once('../src/class/Category.php');

/**
 * Categories
 */
$categories = [

  // Animals
  new Category('Animals', 'animals'),
  new Category('Dogs', 'animals/dogs', 'animals'),
  new Category('Cats', 'animals/cats', 'animals'),
  new Category('Bunny Rabbits', 'animals/bunny-rabbits', 'animals'),
  new Category('Guinea-Pigs', 'animals/guinea-pigs', 'animals'),

  // Vehicles
  new Category('Vehicles', 'vehicles'),
  new Category('Cars', 'vehicles/cars', 'vehicles'),
  new Category('Trucks', 'vehicles/trucks', 'vehicles'),
  new Category('Boats', 'vehicles/boats', 'vehicles'),
  new Category('Motorbikes', 'vehicles/motorbikes', 'vehicles'),

  // Computers
  new Category('Computers', 'computers'),
  new Category('Hand-held Computers', 'computers/hand-held', 'computers'),
  new Category('Notebook Computers', 'computers/notebooks', 'computers'),
  new Category('Desktop Computers', 'computers/desktop', 'computers'),
  new Category('Media Servers', 'computers/media-servers', 'computers')

];

$topLevelCategories = array_filter($categories, function ($cat) {
  return false === $cat->isNested();
});

$pathParts = explode('/', substr(REQUEST_URI, 1));
$isViewingCategory = count($pathParts) > 1;
$hasParent = count($pathParts) > 2;
$parent = $isViewingCategory && $hasParent ? array_slice($pathParts, 1) : null;

$categoryPath = implode('/', array_slice($pathParts, 1));
$parentPath = implode('/', array_slice($pathParts, 1, -1));

$category = true === $isViewingCategory ? array_values(array_filter($categories, function ($cat) use ($categoryPath) {
  return $cat->Path === $categoryPath;
}))[0] : null;

$parentCategory = true === $hasParent ? array_values(array_filter($categories, function ($cat) use ($category) {
  return $cat->Path === $category->ParentID;
}))[0] : null;

$children = true === $isViewingCategory ? array_filter($categories, function ($cat) use ($category) {
  return $cat->ParentID === $category->Path;
}) : null;

$displayCategories = false === $isViewingCategory ? $topLevelCategories : $children;

?>

<main>

  <?php if (true === $isViewingCategory) : ?>

    <?php if (true === $hasParent) : ?>
      <div class="breadcrumbs">
        <a href="/categories">
          Categories
        </a>
        <span> / </span>
        <a href="/categories/<?=$parentCategory->Path?>">
          <?=$parentCategory->Name?>
        </a>
      </div>
    <?php else : ?>
      <a href="/categories">
        Categories
      </a>
    <?php endif; ?>

    <h1><?=$category->Name?></h1>
  <?php else : ?>
    <h1>Categories</h1>
  <?php endif; ?>

  <div class="category-list-wrapper">
    <ol class="category-list">
      <?php foreach ($displayCategories as $category) : ?>
        <li>
          <a href="/categories/<?=$category->Path?>">
            <?=$category->Name?>
          </a>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>

</main>

<style>
  div.breadcrumbs {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
  }

  div.breadcrumbs span {
    margin: 0 0.25rem;
  }

  div.category-list-wrapper {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    margin: 0 -0.5rem;
    flex: 1;
    max-width: 1200px;
    width: 100vw;
  }

  ol.category-list {
    list-style-type: none;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    padding: 0;
  }

  ol.category-list li {
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
    align-items: stretch;
    justify-content: stretch;
    padding: 0.5rem;
    width: 50%;
    max-width: 25%;
    aspect-ratio: 16/9;
  }

  ol.category-list li a {
    background-color: #fff;
    color: #6666bf;
    border-radius: 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex: 1;
    transition: all 333ms;
    text-decoration: none;
    box-shadow: 1px 1px 10px #00000050;
  }

  ol.category-list li a:hover {
    background-color: #6666bf;
    color: #fff;
  }
</style>
