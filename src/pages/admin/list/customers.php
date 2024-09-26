<?php

/**
 * Customer List
 * 
 * Shows a list of Customers
 */

require_once('../src/class/Customer.php');
require_once('../src/methods/Customer/fetchCustomerList.php');

$customers = fetchCustomerList();

?>

<main>
  <h1>Customer List</h1>

  <p class="breadcrumbs">
    <a href="/admin">
      &larr; Admin Dashboard
    </a>
  </p>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th class="wide">Name</th>
        <th>Created</th>
        <th>Last Interaction</th>
        <th>Last Payment</th>
        <th>Revenue (TTL)</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($customers as $customer) : ?>
        <tr>
          <th>
            <?=$customer->getShortID()?>
          </th>

          <td class="wide view-link">
            <a href="/admin/view/customer/<?=$customer->ID?>">
              <?=$customer->Name?>
            </a>
          </td>

          <td><?=date('d/m/y')?></td>

          <td><?=date('d/m/y')?></td>

          <td>-</td>

          <td>US&dollar; 75.00</td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
