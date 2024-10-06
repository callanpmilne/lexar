<?php

/**
 * Note List
 * 
 * Shows a list of Notes
 */

require_once('../src/class/DetailedNote.php');
require_once('../src/methods/Note/fetchNoteList.php');

$notes = fetchNoteList();

?>

<main>
  <div id="PageTitle">
    <h1>Note List</h1>

    <p class="breadcrumbs">
      <a href="/admin">
        &larr; Admin Dashboard
      </a>
    </p>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th class="">Author</th>
        <th style="text-align: left;">Subject</th>
        <th class="wide">Excerpt</th>
        <th style="text-align: right;">Created</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($notes as $note) : ?>
        <tr>
          <th>
            <a href="/admin/view/note/<?=$note->ID?>">
              <?=substr($note->ID, 0, 4)?>...
            </a>
          </th>

          <td>
            <a href="/admin/view/user/<?=$note->Author?>">
              <?=htmlentities($note->AuthorName)?>
            </a>
          </td>

          <td style="text-align: left;">
            <a href="<?=$note->getAdminViewSubjectLink()?>">
              <?=$note->subjectIsOrg() ? '&lt;ORG&gt;' : '&lt;CUST&gt';?>
              <?=htmlentities($note->SubjectName)?>
            </a>
          </td>

          <td class="wide" style="width: 30%">
            <?=htmlentities($note->ContentBody)?>
          </td>

          <td style="text-align: right;">
            <?=date('d/m @ H:i:s', $note->Created)?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
