<?php

/**
 * Category List
 * 
 * Prints a JSON list of Categories
 */

require_once('../src/class/Category.php');
require_once('../src/methods/Category/fetchCategoryList.php');

$query = array_key_exists('q', $_GET) ? $_GET['q'] : '';

$categories = fetchCategoryList();

if ($query && count($categories) > 0) {
  $categories = array_filter($categories, function ($category) use ($query) {
    return $category->matches($query);
  });
}

$categories = numericalArray($categories);

print json_encode($categories, JSON_THROW_ON_ERROR | JSON_OBJECT_AS_ARRAY, 3);

exit(0);

