<?php

/**
 * Admin Dashboard
 */

/**
 * Admin Dashboard Button
 */
class AdminDashboardButton {

  /**
   * Singular Label
   */
  public string $singularLabel;

  /**
   * Singular Name
   */
  public string $singularName;

  /**
   * Plural Label
   */
  public string $pluralLabel;

  /**
   * Plural Name
   */
  public string $pluralName;

  /**
   * Admin Dashboard Button
   * 
   * @param string $singularLabel
   * @param string $singularName
   * @param string $pluralLabel
   * @param string $pluralName
   */
  public function __construct(
    string $singularLabel,
    string $singularName,
    string $pluralLabel,
    string $pluralName,
  ) {
    $this->singularLabel = $singularLabel;
    $this->singularName = $singularName;
    $this->pluralLabel = $pluralLabel;
    $this->pluralName = $pluralName;
  }
  
}

$buttons = array(
  new AdminDashboardButton(
    'Customer',
    'customer',
    'Customers',
    'customers',
  ),
  new AdminDashboardButton(
    'Payment',
    'payment',
    'Payments',
    'payments',
  ),
  new AdminDashboardButton(
    'Interaction',
    'interaction',
    'Interactions',
    'interactions',
  ),
  new AdminDashboardButton(
    'Note',
    'note',
    'Notes',
    'notes',
  ),
  new AdminDashboardButton(
    'Contact',
    'contact',
    'Contacts',
    'contacts',
  ),
  new AdminDashboardButton(
    'Category',
    'category',
    'Categories',
    'categories',
  ),
  new AdminDashboardButton(
    'Type',
    'type',
    'Types',
    'types',
  ),
  new AdminDashboardButton(
    'Metadata',
    'metadata',
    'Metadata',
    'metadata',
  ),
);
?>

<main>
  <h1>Admin Dashboard</h1>

  <div class="admin-dashboard-grid">
    <?php foreach ($buttons as $button) : ?>
      <div class="admin-dashboard-grid-cell">
        <div class="cell-inside">
          <h2><?=$button->pluralLabel?></h2>

          <ul>
            <li>
              <a 
                href="/admin/list/<?=$button->pluralName?>"
                title="List All <?=$button->pluralLabel?>">
                ✏️ Edit <?=$button->pluralLabel?>
              </a>
            </li>
            <li>
              <a 
                href="/admin/create/<?=$button->singularName?>"
                title="Create New <?=$button->singularLabel?>">
                ➕ New <?=$button->singularLabel?>
              </a>
            </li>
          </ul>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>

<?php



?>

<style>
  div.admin-dashboard-grid {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    flex-wrap: wrap;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell h2,
  div.admin-dashboard-grid div.admin-dashboard-grid-cell ul {
    margin: 0;
    padding: 0.2rem 0.5rem;
    list-style-type: none;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell h2 {
    font-size: 0.9rem;
    flex: 1;
    border: none;
    color: rgb(79 118 248 / 99%);
    font-weight: 100;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell {
    display: flex;
    flex-direction: row;
    box-sizing: border-box;
    align-items: stretch;
    justify-content: stretch;
    max-width: 25%;
    width: 25%;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell div.cell-inside {
    display: flex;
    flex: 1;
    box-sizing: border-box;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    margin: 1rem;
    padding: 1rem;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.34);
    border-radius: 0.5rem;
    background: linear-gradient(163deg, rgba(0, 60, 180, 0.25) 0%, rgba(0, 60, 180, 0.1) 50%);
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell ul {
    flex: 2;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell ul li {
    display: flex;
    flex-direction: column;
    justify-content: stretch;
    align-items: stretch;
    border-bottom: 1px solid rgba(0,0,0,0.25);
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell ul li a {
    line-height: 2rem;
    display: block;
    text-decoration: none;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell ul li:last-of-type {
    border-bottom: none;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell {
  }
</style>
