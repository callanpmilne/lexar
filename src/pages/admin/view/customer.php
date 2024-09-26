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

  <div class="customer-page">
    <div class="secondary-content">
      <section>
        <h2>Profile</h2>

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
      </section>

      <section>
        <h2>Recent Transactions</h2>

        <p>Recent Transactions...</p>
      </section>
    </div>

    <div class="primary-content">
      <section class="note-editor">
        Add Note Editor Here to Add Notes Easily
      </section>

      <section>
        <h2>Notes</h2>

        <p>Notes...</p>
      </section>

      <section>
        <h2>Interactions</h2>

        <p>Interactions...</p>
      </section>
    </div>
  </div>
</main>

<style>
main div.customer-page {
  display: flex;
  width: 100%;
  flex-direction: row-reverse;
  align-items: flex-start;
  justify-content: stretch;
}

main div.customer-page div.primary-content,
main div.customer-page div.secondary-content {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
}

main div.customer-page div.secondary-content {
  flex: 2;
}

main div.customer-page section {
  margin-bottom: 2rem;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: stretch;
}

main div.customer-page div.primary-content {
  padding-right: 2rem;
  flex: 4;
}

main div.customer-page section.note-editor {
  aspect-ratio: 16 / 6;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.2);
  border-radius: 1rem;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
}

ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}
</style>
