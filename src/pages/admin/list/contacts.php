<?php

/**
 * Contact List
 * 
 * Shows a list of Contacts
 */

require_once('../src/class/ContactMethod.php');
require_once('../src/methods/Contact/fetchContactMethodList.php');

$contactMethods = fetchContactMethodList();

?>

<main>
  <h1>Contact Method List</h1>

  <p class="breadcrumbs">
    <a href="/admin">
      &larr; Admin Dashboard
    </a>
  </p>

  <table>
    <thead>
      <tr>
        <th>Medium</th>
        <th>Identifier</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($contactMethods as $contactMethod) : ?>
        <tr>
          <td>
            <?=$contactMethod->Medium?>
          </td>
          
          <td class="view-link">
            <a href="/admin/view/contactMethod/<?=$contactMethod->ID?>">
              <?=$contactMethod->Identifier?>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>