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
      <h1><?=$category->Name?></h1>
      <p class="breadcrumbs">
      <?php if (true === $hasParent) : ?>
        <a href="/categories">
          Categories
        </a>
        <span> / </span>
        <a href="/categories/<?=$parentCategory->Path?>">
          <?=$parentCategory->Name?>
        </a>
      <?php else : ?>
        <a href="/categories">
          &larr; Categories
        </a>
      <?php endif; ?>
      </p>
    <?php else : ?>
      <h1>Categories</h1>
    <?php endif; ?>
  </div>

  <?php if (count($displayCategories) > 0) : ?>
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
  <?php endif; ?>

  <?php if (true === $isViewingCategory) : ?>

    <section class="content-grid">
      <h2>Recent Videos</h2>

      <div class="content-list-wrapper">
        <ol class="content-list">
          <?php for ($i = 0; $i < 8; $i++) : ?>
            <li>
              <a href="/video/<?=substr(md5(uniqid()),0,8);?>">
                <span style="font-size: 2.5rem;color:#1cdfb5;">&#9654;</span>
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

    <section class="content-grid">
      <h2>Recent Posts</h2>
      
      <div class="content-list-wrapper">
        <ol class="content-list">
          <?php for ($i = 0; $i < 8; $i++) : ?>
            <li>
              <a href="/post/<?=substr(md5(uniqid()),0,8);?>">
                <span style="font-size: 2.5rem;color:#1cdfb5;">&#9654;</span>
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

    <section class="content-grid">
      <h2>Recent Pics</h2>
      
      <div class="content-list-wrapper">
        <ol class="content-list">
          <?php for ($i = 0; $i < 8; $i++) : ?>
            <li>
              <a href="/pic/<?=substr(md5(uniqid()),0,8);?>">
                <span style="font-size: 2.5rem;color:#1cdfb5;">&#9654;</span>
                <?=$catNameSingular?> Pic #<?=$i?>
                <span>View Pic &rarr;</span>
                
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

  <?php endif; ?>

</main>

<style>
  section.content-grid {
    max-width: 1200px;
    width: 100vw;
  }
  
  section.content-grid h2 {
    padding-left: 1rem;
    padding-right: 1rem;
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
</style>
