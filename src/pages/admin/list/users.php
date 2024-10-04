<?php

/**
 * Contact List
 * 
 * Shows a list of Contacts
 */

require_once('../src/class/User.php');
require_once('../src/methods/User/fetchUserList.php');

$users = fetchUserList();

?>

<main>
  <div id="PageTitle">
    <h1>User List</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <table>
    <thead>
      <tr>
        <th style="width: 30%;">ID</th>
        <th style="text-align: left;">Username</th>
        <th style="text-align: left;">Name</th>
        <th>Role</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($users as $user) : ?>
        <tr>
          <td class="view-link">
            <a href="/admin/view/user/<?=$user->ID?>">
              <?=$user->ID?>
            </a>
          </td>

          <td style="text-align: left;">
            <?=$user->Name?>
          </td>

          <td style="text-align: left;">
            <?=$user->Username?>
          </td>

          <td>
            <?=$user->IsSuperAdmin ? 'ADMIN' : 'CUSTOMER'?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>