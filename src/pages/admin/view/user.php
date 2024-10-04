<?php

/**
 * User
 * 
 * Shows a single User
 */

require_once('../src/class/User.php');
require_once('../src/methods/User/fetchUser.php');

$pathParts = explode('/', substr(REQUEST_URI, 1));
$UserID = array_slice($pathParts, -1)[0];

$user = fetchUserByID($UserID);

?>

<main id="ViewUserPage">
  <div id="PageTitle">
    <h1>View User</h1>

    <p>
      <a href="/admin/list/users">
        &larr; Return to User List
      </a>
    </p>
  </div>

  <section>
    <ul>
      <li>
        <h3>ID</h3>
        <?=$user->ID?>
      </li>

      <li>
        <h3>Name</h3>
        <?=$user->Name?>
      </li>
    </ul>
  </section>
</main>

<style>
main#ViewUserPage section {
  display: flex;
  flex-direction: row-reverse;
  align-items: flex-start;
  justify-content: flex-start;
}

main#ViewUserPage h3 {
  margin: 0;
  font-size: 0.85rem;
  font-weight: 100;
  color: rgba(255,255,255,0.8);
}

main#ViewUserPage ul li {
  margin-bottom: 0.5rem;
}
</style>
