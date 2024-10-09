<?php

/**
 * Type List
 * 
 * Prints a JSON list of Types
 */

require_once('../src/class/Entities/Detailed/EntityType.php');
require_once('../src/methods/Entity/fetchEntityTypeList.php');

// Ensure user is a super admin (checks via cookie)
if (!isSuperAdmin()) {
  http_response_code(200);
  print '{}';
  exit(0);
}

$query = array_key_exists('q', $_GET) ? $_GET['q'] : '';

$types = fetchEntityTypeList();

if ($query && count($types) > 0) {
  $types = array_filter($types, function ($type) use ($query) {
    return $type->matches($query);
  });
}

$types = numericalArray($types);

print json_encode($types, JSON_THROW_ON_ERROR | JSON_OBJECT_AS_ARRAY, 3);

exit(0);
