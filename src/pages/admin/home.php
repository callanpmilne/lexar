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
                href="/admin/search/<?=$button->pluralName?>"
                title="<?=$button->singularLabel?> Search">
                🔎 Lookup
              </a>
            </li>

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
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    flex-wrap: nowrap;
    margin-top: 4rem;
    width: 100%;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell h2,
  div.admin-dashboard-grid div.admin-dashboard-grid-cell ul {
    margin: 0;
    padding: 0.2rem 0.5rem;
    list-style-type: none;
    border-radius: 0.5rem;
    overflow: hidden;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell h2 {
    font-size: 0.8rem;
    border: none;
    font-weight: 500;
    color: rgb(1 29 36);
    border-radius: 0.25rem;
    width: 30%;
    margin: 0;
    padding: 0;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell {
    display: flex;
    flex-direction: row;
    box-sizing: border-box;
    align-items: stretch;
    justify-content: stretch;
    min-width: 100%;
    max-width: 100%;
    width: 100%;
    flex: 1;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell div.cell-inside {
    display: flex;
    flex: 1;
    box-sizing: border-box;
    flex-direction: row;
    align-items: flex-start;
    justify-content: flex-end;
    margin: 0.5rem 0;
    padding: 1rem;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.34);
    border-radius: 0.5rem;
    background: linear-gradient(163deg, rgb(186 218 255 / 47%) 0%, rgb(255 255 255 / 69%) 100%);
    transition: all 333ms;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell ul {
    flex: 1;
    margin: 0;
    padding: 0;
    border-radius: 0.5rem;
    background: linear-gradient(163deg, rgb(0 69 97 / 10%) 0%, rgb(3 84 85 / 20%) 100%);
    border: 1px solid #5b98a3;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell ul li {
    display: flex;
    flex-direction: column;
    justify-content: stretch;
    align-items: stretch;
    border-bottom: 2px solid rgb(0 70 98 / 30%);
    font-size: 0.85rem;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell ul li a {
    line-height: 2rem;
    display: block;
    text-decoration: none;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow-y: hidden;
    color: #ffffff;
    font-weight: 400;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    padding: 0 0.5rem;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell div.cell-inside ul li a:hover {
    background: linear-gradient(163deg, rgb(0 69 97 / 50%) 0%, rgb(3 84 85) 100%);
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell ul li:last-of-type {
    border-bottom: none;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell {
  }

  @media only screen and (min-width: 800px) {
    div.admin-dashboard-grid {
      flex-direction: row;
      flex-wrap: wrap;
      width: auto;
    }

    div.admin-dashboard-grid div.admin-dashboard-grid-cell div.cell-inside {
      margin: 1rem;
    }

    div.admin-dashboard-grid div.admin-dashboard-grid-cell {
      flex: auto;
      max-width: 25%;
      width: 25%;
    }
  }
</style>
