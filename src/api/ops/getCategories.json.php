<?php

/**
 * Category List
 * 
 * Prints a JSON list of Categories
 */

require_once('../src/class/Category.php');
require_once('../src/methods/Category/fetchCategoryList.php');

$categories = fetchCategoryList();

print json_encode($categories, JSON_THROW_ON_ERROR, 2);
