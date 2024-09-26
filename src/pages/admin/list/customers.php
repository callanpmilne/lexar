<?php

/**
 * Customer List
 * 
 * Shows a list of Customers
 */

require_once('../src/class/Customer.php');

$customers = fetchCustomerList();

?>

<main>
  <h1>Customer List</h1>
  <ul>
    <?php foreach ($customers as $customer) : ?>
      <li>
        <a href="/admin/view/customer/<?=$customer->ID?>">
          <?=$customer->Name?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</main>
