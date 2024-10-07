<?php

require_once('../src/class/Category.php');
require_once('../src/methods/Category/fetchCategoryList.php');

/**
 * Create Category Form Component
 */

include('../src/common/input/uuid.php');
include('../src/common/input/category.php');

/**
 * Categories
 */
$categories = fetchCategoryList();
$topLevelCategories = array_filter($categories, function ($cat) {
  return false === $cat->isNested();
});

?>

<div 
  class="component-form">

  <?=uuidField('Category ID')?> 

  <?=categoryField(2, 'Parent Category')?> 

  <div 
    class="component-form-field">
    <label
      for="CreateCategoryInputName">
      Category Path
    </label>

    <input 
      id="CreateCategoryInputPath"
      name="path"
      type="input"
      tabindex="3"
      placeholder="E.g. /animals/dog" />
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreateCategoryInputName">
      Category Name
    </label>

    <input 
      id="CreateCategoryInputName"
      name="categoryName"
      type="input"
      tabindex="4"
      placeholder="E.g. Mountain" />
  </div>

  <div
    class="component-form-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit"
      tabindex="5">
      Create
    </button>

    <input
      name="is_create_category_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }
  select {

  }
  select option {
    display: flex;
    flex-direction: row;
  }
  select option span:nth-of-type(1) {
    display: flex;
    flex: 1;
    font-weight: 600;
  }
</style>
