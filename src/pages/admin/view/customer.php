<?php

/**
 * Customer
 * 
 * Shows a single Customer
 */

require_once('../src/class/Customer.php');
require_once('../src/methods/Customer/fetchCustomer.php');
require_once('../src/methods/Customer/fetchCustomerNotes.php');
require_once('../src/methods/Customer/fetchCustomerInteraction.php');

$pathParts = explode('/', substr(REQUEST_URI, 1));
$CustomerID = array_slice($pathParts, -1)[0];

$customer = fetchCustomer($CustomerID);

$notes = fetchCustomerNotes($CustomerID);
$interactions = fetchCustomerInteractions($CustomerID);

?>

<main>
  <h1>Customer</h1>

  <p class="breadcrumbs">
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

        <table>
          <thead>
            <tr>
              <th>
                <input id=""
                  name=""
                  type="checkbox"
                  value="" />
              </th>

              <th>Description</th>
              <th>Date</th>
              <th>Amount</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>
                <input id=""
                  name=""
                  type="checkbox"
                  value="" />
              </td>

              <td>Short description of the payment</td>
              <td><?=print(date('d/m/y'))?></td>
              <td>US&dollar; 123.00</td>
            </tr>
          </tbody>
        </table>
      </section>
    </div>

    <div class="primary-content">
      <section class="note-editor">
        Add Note Editor Here to Add Notes Easily
      </section>

      <section>
        <h2>Notes</h2>

        <table id="CustomerNotes">
          <thead>
            <tr>
              <th>
                <input id=""
                  name=""
                  type="checkbox"
                  value="" />
              </th>

              <th>Author</th>

              <th>Created</th>

              <th class="wide">Note</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($notes as $note) : ?>
              <tr>
                <td>
                  <input id=""
                    name=""
                    type="checkbox"
                    value="" />
                </td>

                <td>
                  <a href="/admin/view/user/<?=$note->Author?>">Admin</a>
                </td>

                <td>
                  <?=date('d/m/Y', $note->Recorded)?><br />
                  <?=date('h:i:sA', $note->Recorded)?>
                </td>

                <td class="wide">
                  <p>
                    <?=str_replace(
                      '/\n\n/', 
                      '</p><p>', 
                      nl2br($note->ContentBody))?>
                  </p>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </section>

      <section>
        <h2>Interactions</h2>

        <table id="CustomerInteractions">
          <thead>
            <tr>
              <th>
                <input id=""
                  name=""
                  type="checkbox"
                  value="" />
              </th>

              <th>Who</th>

              <th>When</th>

              <th class="wide">Interaction Details</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($interactions as $interaction) : ?>
              <tr>
                <td>
                  <input id=""
                    name=""
                    type="checkbox"
                    value="" />
                </td>

                <td>
                  <a href="/admin/view/user/<?=$interaction->Author?>">Admin</a>
                </td>

                <td>
                  <?=date('d/m/Y h:i:sA', $interaction->StartTime)?><br />
                  <?=date('d/m/Y h:i:sA', $interaction->EndTime)?>
                </td>

                <td class="wide">
                  <p>
                    <?=str_replace(
                      '/\n\n/', 
                      '</p><p>', 
                      nl2br($interaction->ContentBody))?>
                  </p>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </section>
    </div>
  </div>
</main>

<style>
table#CustomerNotes {

}

table#CustomerNotes tr th,
table#CustomerNotes tr td,
table#CustomerInteractions tr th,
table#CustomerInteractions tr td {
  text-align: left;
}

main div.customer-page {
  display: flex;
  flex-direction: row-reverse;
  align-items: stretch;
  justify-content: stretch;
  width: 100%;
}

main div.customer-page div.primary-content,
main div.customer-page div.secondary-content {
  display: flex;
  flex-direction: column;
  align-items: stretch;
  justify-content: stretch;
}

main div.customer-page div.secondary-content {
  flex: 2;
}

main div.customer-page section {
  margin-bottom: 2rem;
  display: flex;
  flex-direction: column;
  align-items: stretch;
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
