<?php

/**
 * Customer
 * 
 * Shows a single Customer
 */

require_once('../src/class/Customer.php');

$pathParts = explode('/', substr(REQUEST_URI, 1));
$CustomerID = array_slice($pathParts, -1)[0];

$customer = new Customer(
  $CustomerID, 
  'John Key'
);

//$customer = fetchCustomer($CustomerID);

?>

<main>
  <h1>Customer</h1>
  <ul>
    <li>
      <span class="label">ID:</span>
      <?=$customer->ID?>
    </li>

    <li>
      <span class="label">Name:</span>
      <?=$customer->Name?>
    </li>
  </ul>
</main>
