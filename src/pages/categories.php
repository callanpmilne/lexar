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

$catNameSingular = true === $isViewingCategory 
  ? preg_replace(['/(ies)$/', '/(s)$/'], ['y', ''], $category->Name) 
  : '';

?>

<main>

  <div id="PageTitle">
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
          &larr; Categories
        </a>
      <?php endif; ?>

      <h1><?=$category->Name?></h1>
    <?php else : ?>
      <h1>Categories</h1>
    <?php endif; ?>
    </div>

  <div class="category-list-wrapper">
    <ol class="category-list">
      <?php foreach ($displayCategories as $cat) : ?>
        <li>
          <a href="/categories/<?=$cat->Path?>">
            <?=$cat->Name?>
            <span>Browse <?=$cat->Name?> &rarr;</span>
          </a>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>

  <?php if (true === $isViewingCategory) : ?>

    <section>
      <h2>Recent Posts</h2>
      
      <div class="content-list-wrapper">
        <ol class="content-list">
          <?php for ($i = 0; $i < 8; $i++) : ?>
            <li>
              <a href="/">
                <?=$catNameSingular?> Post #<?=$i?>
                <span>View Post &rarr;</span>

                <div class="item-info">
                  <div>
                    <span>1m 35s</span>
                    <span>Posted 3 Minutes Ago</span>
                  </div>

                  <div>
                    <span></span>
                    <span>By @testuser</span>
                  </div>
                </div>
              </a>
            </li>
          <?php endfor; ?>
        </ol>
      </div>
    </section>

    <section>
      <h2>Recent Photos</h2>
      
      <div class="content-list-wrapper">
        <ol class="content-list">
          <?php for ($i = 0; $i < 8; $i++) : ?>
            <li>
              <a href="/">
                <?=$catNameSingular?> Photo #<?=$i?>
                <span>View Photo &rarr;</span>
                
                <div class="item-info">
                  <div>
                    <span>1280x1024</span>
                    <span>Posted 3 Minutes Ago</span>
                  </div>

                  <div>
                    <span></span>
                    <span>By @testuser</span>
                  </div>
                </div>
              </a>
            </li>
          <?php endfor; ?>
        </ol>
      </div>
    </section>

    <section>
      <h2>Recent Videos</h2>

      <div class="content-list-wrapper">
        <ol class="content-list">
          <?php for ($i = 0; $i < 8; $i++) : ?>
            <li>
              <a href="/">
                <?=$catNameSingular?> Video #<?=$i?>
                <span>View Video &rarr;</span>
                
                <div class="item-info">
                  <div>
                    <span>1m 35s</span>
                    <span>Posted 3 Minutes Ago</span>
                  </div>

                  <div>
                    <span></span>
                    <span>By @testuser</span>
                  </div>
                </div>
              </a>
            </li>
          <?php endfor; ?>
        </ol>
      </div>
    </section>

  <?php endif; ?>

</main>

<style>
  section {
    max-width: 1200px;
    width: 100vw;
  }
  
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
    margin: 1rem -0.5rem;
    max-width: 1200px;
    width: 100vw;
  }

  ol.category-list,
  ol.content-list {
    list-style-type: none;
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-items: stretch;
    justify-content: stretch;
    padding: 0;
    margin: 0;
  }

  ol.category-list li,
  ol.content-list li {
    display: flex;
    flex-direction: row;
    box-sizing: border-box;
    align-items: stretch;
    justify-content: stretch;
    width: 100%;
  }

  ol.category-list li a,
  ol.content-list li a {
    display: flex;
    flex: 1;
    box-sizing: border-box;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0.5rem 1rem;
    padding: 1rem;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.34);
    border-radius: 0.5rem;
    background: linear-gradient(163deg, rgb(186 218 255 / 47%) 0%, rgb(255 255 255 / 69%) 100%);
    transition: all 333ms;
    aspect-ratio: 16 / 6;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    color: #012e39;
    font-size: 1.1rem;
    font-weight: 500;
    text-decoration: none;
  }

  ol.content-list li a {
    background: rgba(0,0,0,0.2);
    color: #fff;
    border: 1px solid #5ad8ff;
    aspect-ratio: 16/9;
    position: relative;
    margin-bottom: 4rem;
    color: rgb(255,255,255,0.5);
  }

  ol.category-list li a:hover,
  ol.content-list li a:hover {
    background-color: rgb(186 218 255 / 47%);
    box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.34);
  }

  ol.category-list li a span,
  ol.content-list li a span {
    font-size: 0.8rem;
    font-weight: 100;
  }

  div.item-info {
    position: absolute;
    left: 0;
    right: 0;
    top: 100%;
    height: 4rem;
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: stretch;
    font-size: 1.1rem;
    padding: 0.5rem 0.35rem 0;
    line-height: 1.5rem;
    color: rgba(255,255,255,0.75);
  }

  ol.content-list li a:hover {
    color: rgba(255,255,255,0.9);
  }

  ol.content-list li a:hover div.item-info {
    color: rgba(255,255,255,1);
  }

  div.item-info > div {
    display: flex;
    flex-direction: row;
    align-items: stretch;
    justify-content: space-between;
  }

  div.item-info {

  }

  @media only screen and (min-width: 800px) {
    
    ol.category-list,
    ol.content-list {
      flex-direction: row;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
    }

    ol.category-list li,
    ol.content-list li {
      max-width: 25%;
      width: 25%;
    }

    ol.category-list li a,
    ol.content-list li a {
      margin: 1rem;
    }

    ol.content-list li a {
      margin: 1rem 1rem 4rem;
    }

    div.category-list-wrapper,
    div.content-list-wrapper {
      margin: 2rem -0.5rem;
    }

  }
</style>
