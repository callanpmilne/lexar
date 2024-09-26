<?php

/**
 * Customer
 * 
 * Shows a single Customer
 */

require_once('../src/class/Customer.php');
require_once('../src/methods/Customer/fetchCustomer.php');

$pathParts = explode('/', substr(REQUEST_URI, 1));
$CustomerID = array_slice($pathParts, -1)[0];

$customer = fetchCustomer($CustomerID);

?>

<main>
  <h1>Customer</h1>

  <p>
    <a href="/admin/list/customers">
      &larr; Return to Customer List
    </a>
  </p>

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
