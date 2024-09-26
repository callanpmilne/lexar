<?php
/**
 * Create Category Form Component
 */
?>

<div 
  class="component-form-create-category">
  <div 
    class="component-form-create-category-field">
    <label
      for="CreateCategoryInputName">
      Category Name
    </label>

    <input 
      id="CreateCategoryInputName"
      name="categoryName"
      type="input"
      tabindex="2" />
  </div>

  <div
    class="component-form-create-category-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit">
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

  div.component-form-create-category {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    min-width: 20rem;
    max-width: 30vw;
  }

  div.component-form-create-category div.component-form-create-category-field {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    padding: 0.5rem 0;
  }

  div.component-form-create-category div.component-form-create-category-buttons {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    height: 2.5rem;
  }

  div.component-form-create-category div.component-form-create-category-buttons > * {
    cursor: pointer;
  }
</style>
