<?php

/**
 * Customer
 * 
 * Shows a single Customer
 */

require_once('../src/class/Customer.php');
require_once('../src/methods/Customer/fetchCustomer.php');
require_once('../src/methods/Customer/fetchCustomerNotes.php');
require_once('../src/methods/Customer/fetchCustomerInteractions.php');
require_once('../src/methods/Customer/fetchCustomerPayments.php');

$pathParts = explode('/', substr(REQUEST_URI, 1));
$CustomerID = array_slice($pathParts, -1)[0];

$customer = fetchCustomer($CustomerID);

$notes = fetchCustomerNotes($CustomerID);
$payments = fetchCustomerPayments($CustomerID);
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
        <h2>Recent Payments</h2>

        <table id="CustomerPayments">
          <thead>
            <tr>
              <th class="payment-description">Description</th>

              <th class="payment-date">
                Processed
              </th>

              <th>Amount</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($payments as $payment) : ?>
              <tr>
                <td class="payment-description">
                  <?=$payment->Description?>
                </td>

                <td class="payment-date">
                  <?=date('d/m/y H:i', $payment->Recorded)?>
                </td>

                <td>US&dollar; <?=$payment->getAmount('.')?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </section>
    </div>

    <div class="primary-content">
      <section class="note-editor">
        <?php include('../src/components/forms/create/note.php'); ?>
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
                    <?=trim(nl2br(preg_replace(
                      '/(\n\w*\n)/', 
                      '</p><p>', 
                      $note->ContentBody
                    )))?>
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
                    <?=trim(nl2br(preg_replace(
                      '/(\n\w*\n)/', 
                      '</p><p>', 
                      $interaction->ContentBody
                    )))?>
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
table#CustomerPayments .payment-description {
  text-align: left;
  width: 40%;
}

table#CustomerPayments .payment-date {
  text-align: right;
}

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
