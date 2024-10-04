<?php

/**
 * Organisation
 * 
 * Shows a single Organisation
 */

require_once('../src/class/Organisation.php');
require_once('../src/methods/Organisation/createOrganisationNote.php');
require_once('../src/methods/Organisation/fetchOrganisation.php');
require_once('../src/methods/Organisation/fetchOrganisationNotes.php');
require_once('../src/methods/Organisation/fetchOrganisationInteractions.php');
require_once('../src/methods/Organisation/fetchOrganisationPayments.php');

$pathParts = explode('/', substr(REQUEST_URI, 1));
$OrganisationID = array_slice($pathParts, -1)[0];

$organisation = fetchOrganisation($OrganisationID);

/**
 * Check for (and handle) form submissions
 */
handleSubmissions($OrganisationID);

/**
 * Fetch Notes, Payments, Interactions, etc.
 * Specifically runs after submission handling (above)
 * so it may include any new rows.
 */
$notes = fetchOrganisationNotes($OrganisationID);
$payments = fetchOrganisationPayments($OrganisationID);
$interactions = fetchOrganisationInteractions($OrganisationID);

/**
 * Handle (Form) Submissions
 * 
 * @param string $OrganisationID
 * @return void
 */
function handleSubmissions ($OrganisationID) {
  $isCreateNoteSubmit = 
    array_key_exists('is_create_note_submit', $_POST)
      && '1' === $_POST['is_create_note_submit'];
  
  if (true === $isCreateNoteSubmit) {
    try {
      handleNoteSubmission($OrganisationID);
    }
    catch (Exception $e) {
      // do nothing
    }
  }
}

/**
 * Handle Note (Form) Submission
 * 
 * @param string $OrganisationID
 * @return void
 */
function handleNoteSubmission ($OrganisationID) {
  $Author = GlobalSession::getGlobalSession()->getUserID();
  $ContentBody = 
    array_key_exists('noteContentBody', $_POST)
      && $_POST['noteContentBody']
      ? $_POST['noteContentBody']
      : "" ;

  createOrganisationNote(OrganisationNote::CreateOrganisationNote(
    $OrganisationID,
    $Author,
    $ContentBody
  ));
}

?>

<main>
  <div id="PageTitle">
    <h1>ORG: <?=htmlentities($organisation->Name)?></h1>

    <p class="breadcrumbs">
      <a href="/admin/list/orgs">
        &larr; Return to Organisation List
      </a>
    </p>
  </div>

  <div class="organisation-page">
    <div class="secondary-content">
      <section>
        <h2>Profile</h2>

        <ul>
          <li>
            <span class="label">ID:</span>
            <?=$organisation->ID?>
          </li>

          <li>
            <span class="label">Name:</span>
            <?=htmlentities($organisation->Name)?>
          </li>
        </ul>
      </section>

      <section>
        <h2>Recent Payments</h2>

        <?php if (count($payments) > 0) : ?>
          <table id="OrganisationPayments">
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
                    <?=date('d/m/y H:i', $payment->Received)?>
                  </td>

                  <td>US&dollar; <?=$payment->getAmount('.')?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else : ?>
          <p style="margin: 0;">No payments for this organisation, yet.</p>
        <?php endif; ?>
      </section>
      
      <section class="note-editor">
        <form
          id="CreateNoteForm"
          action="/admin/view/org/<?=$OrganisationID?>" 
          method="POST">
          <?php include('../src/common/form/create/note.php'); ?>
        </form>
      </section>
    </div>

    <div class="primary-content">
      <section>
        <h2>Notes</h2>

        <table id="OrganisationNotes">
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

        <table id="OrganisationInteractions">
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
table#OrganisationPayments .payment-description {
  text-align: left;
  width: 40%;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}

table#OrganisationPayments .payment-date {
  text-align: right;
}

table#OrganisationNotes {

}

section.note-editor {

}

form#CreateNoteForm,
form#CreateNoteForm div.component-form {
  display: flex;
  flex: 1;
}

form#CreateNoteForm div.component-form div.component-form-buttons {
  padding-bottom: 1rem;
}

form#CreateNoteForm label {
  padding: 0 1rem 0.5rem;
}

form#CreateNoteForm textarea {
  width: 100%;
  height: 14rem;
  background: rgba(0,0,0,0.25);
  border-width: 1px 0;
  border-style: solid;
  border-color: rgba(255,255,255,0.5);
  box-sizing: border-box;
  color: rgba(255,255,255,0.8);
  padding: 0.5rem 1rem;
}

form#CreateNoteForm button[type=submit] {
  margin-right: 1rem;
  background: linear-gradient(to bottom, white, #eee);
  border-radius: 0.25rem;
  border: none;
  line-height: 2rem;
  padding: 0 1rem;
  color: #137564;
}

table#OrganisationNotes tr th,
table#OrganisationNotes tr td,
table#OrganisationInteractions tr th,
table#OrganisationInteractions tr td {
  text-align: left;
}

main div.organisation-page {
  display: flex;
  flex-direction: row-reverse;
  align-items: stretch;
  justify-content: stretch;
  width: 100%;
}

main div.organisation-page div.component-form {
  padding: 0;
  background: none;
  border-radius: 0;
}

main div.organisation-page div.primary-content,
main div.organisation-page div.secondary-content {
  display: flex;
  flex-direction: column;
  align-items: stretch;
  justify-content: stretch;
}

main div.organisation-page div.secondary-content {
  flex: 2;
}

main div.organisation-page section {
  margin-bottom: 2rem;
  display: flex;
  flex-direction: column;
  align-items: stretch;
  justify-content: stretch;
}

main div.organisation-page div.primary-content {
  padding-right: 2rem;
  flex: 4;
}

main div.organisation-page section.note-editor {
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
