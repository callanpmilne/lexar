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

  <p>
    <a href="/admin">
      &larr; Admin Dashboard
    </a>
  </p>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($customers as $customer) : ?>
        <tr>
          <th>
            <?=$customer->getShortID()?>
          </th>

          <td>
            <a href="/admin/view/customer/<?=$customer->ID?>">
              <?=$customer->Name?>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
