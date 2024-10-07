<?php

/**
 * Org List
 * 
 * Prints a JSON list of Orgs
 */

require_once('../src/class/DetailedOrganisation.php');
require_once('../src/methods/Organisation/fetchOrganisationList.php');

// Ensure user is a super admin (checks via cookie)
if (!isSuperAdmin()) {
  http_response_code(200);
  print '{}';
  exit(0);
}

$query = array_key_exists('q', $_GET) ? $_GET['q'] : '';

$orgs = fetchOrganisationList();

if ($query && count($orgs) > 0) {
  $orgs = array_filter($orgs, function ($org) use ($query) {
    return $org->matches($query);
  });
}

$orgs = numericalArray($orgs);

print json_encode($orgs, JSON_THROW_ON_ERROR | JSON_OBJECT_AS_ARRAY, 3);

exit(0);
