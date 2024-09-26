<?php
/**
 * Categories Page
 * 
 * Shows a list of Categories
 */

require_once('../src/class/Category.php');
require_once('../src/methods/Category/fetchCategoryList.php');

/**
 * Categories
 */
$categories = fetchCategoryList();
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
  return $cat->ID === $category->ParentID;
}))[0] : null;

$children = true === $isViewingCategory ? array_filter($categories, function ($cat) use ($category) {
  return $cat->isNested() && $cat->ParentID === $category->ID;
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

  <?php if (true === $isViewingCategory) : ?>

    <section>
      <h2>Recent Posts</h2>
      
      <div class="">

      </div>
    </section>

    <section>
      <h2>Recent Photos</h2>
      
      <div class="">
        
      </div>
    </section>

    <section>
      <h2>Recent Videos</h2>
      
      <div class="">
        
      </div>
    </section>

  <?php endif; ?>

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
    margin: 4rem -0.5rem 0;
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
    flex-direction: row;
    box-sizing: border-box;
    align-items: stretch;
    justify-content: stretch;
    max-width: 25%;
    width: 25%;
    /* aspect-ratio: 16/9; */
  }

  ol.category-list li a {
    display: flex;
    flex: 1;
    box-sizing: border-box;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin: 1rem;
    padding: 1rem;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.34);
    border-radius: 0.5rem;
    background: linear-gradient(163deg, rgb(186 218 255 / 47%) 0%, rgb(255 255 255 / 69%) 100%);
    transition: all 333ms;
    aspect-ratio: 16 / 8;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    color: #012e39;
    font-size: 1.4rem;
    font-weight: 500;
    text-decoration: none;
  }

  ol.category-list li a:hover {
    background-color: rgb(186 218 255 / 47%);
    box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.34);
  }
</style>
