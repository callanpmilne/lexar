<?php

require_once('../src/class/Tool.php');

/**
 * Admin Dashboard
 */

/**
 * Admin Dashboard Button
 */
class AdminDashboardButton {
  public string $icon;

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
   * @param string $icon
   * @param string $singularLabel
   * @param string $singularName
   * @param string $pluralLabel
   * @param string $pluralName
   */
  public function __construct(
    string $icon,
    string $singularLabel,
    string $singularName,
    string $pluralLabel,
    string $pluralName,
  ) {
    $this->icon = $icon;
    $this->singularLabel = $singularLabel;
    $this->singularName = $singularName;
    $this->pluralLabel = $pluralLabel;
    $this->pluralName = $pluralName;
  }
  
}

$buttons = array(
  new AdminDashboardButton(
    '🧬',
    'Entity',
    'entity',
    'Entities',
    'entities',
  ),
  new AdminDashboardButton(
    '🧬',
    'Entity Type',
    'entity/type',
    'Entity Types',
    'entity/types',
  ),
  new AdminDashboardButton(
    '🧬',
    'Entity Type Attribute',
    'entity/type/attribute',
    'Entity Type Attributes',
    'entity/type/attributes',
  ),
  new AdminDashboardButton(
    '📁',
    'Customer',
    'customer',
    'Customers',
    'customers',
  ),
  new AdminDashboardButton(
    '🔒',
    'Payment',
    'payment',
    'Payments',
    'payments',
  ),
  new AdminDashboardButton(
    '📋',
    'Interaction',
    'interaction',
    'Interactions',
    'interactions',
  ),
  new AdminDashboardButton(
    '📇',
    'Contact',
    'contact',
    'Contacts',
    'contacts',
  ),
  new AdminDashboardButton(
    '⌨️',
    'User',
    'user',
    'Users',
    'users',
  ),
  new AdminDashboardButton(
    '📁',
    'Note',
    'note',
    'Notes',
    'notes',
  ),
  new AdminDashboardButton(
    '📚',
    'Category',
    'category',
    'Categories',
    'categories',
  ),
  new AdminDashboardButton(
    '⌨️',
    'Page Metadata',
    'metadata',
    'Page Metadata',
    'metadata',
  ),
  new AdminDashboardButton(
    '📚',
    'API Route',
    'api/route',
    'API Routes',
    'api/routes',
  ),
);

/**
 * Tools
 */
$tools = [
  new Tool(
    '⚙️',
    'Api Builder',
    '/api/builder'
  ),
  new Tool(
    '🚀',
    'Portal Builder',
    '/portal/builder'
  ),
  new Tool(
    '🧬',
    'Entity Manager',
    '/entity/manager'
  ),
  new Tool(
    '💻',
    'Module Builder',
    '/code/writer'
  ),
  new Tool(
    '🔑',
    'Password Generator',
    '/password/generator'
  ),
  new Tool(
    '📦',
    'Timestamp Converter',
    '/timestamp/converter'
  ),
  new Tool(
    '📦',
    'UUID Generator',
    '/uuid/generator'
  ),
  new Tool(
    '🔐',
    'Password Hasher',
    '/password/hasher'
  ),
]
?>

<main>
  <div id="PageTitle">
    <h1>Admin Dashboard</h1>
  </div>

  <section class="admin-button-grid">
    <div class="content-list-wrapper">
      <ol class="content-list">
        <?php foreach ($tools as $tool) : ?>
          <li>
            <a href="/admin/tools<?=$tool->Path?>">
              <span class="label"><?=$tool->Label?></span>
              <span class="button">Use Tool &rarr;</span>
              <span class="icon"><?=$tool->Icon?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <div class="admin-dashboard-grid">
    <?php foreach ($buttons as $button) : ?>
      <?=renderAdminDashboardTitle(
        $button->icon,
        $button->pluralLabel,
        $button->pluralName,
        $button->singularLabel,
        $button->singularName
      )?>
    <?php endforeach; ?>
  </div>
</main>

<style>
  section.admin-button-grid {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    flex-wrap: nowrap;
    width: 100%;
  }

  section.admin-button-grid div.content-list-wrapper {

  }

  section.admin-button-grid div.content-list-wrapper ol.content-list {
    list-style-type: none;
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-items: stretch;
    justify-content: center;
    padding: 0;
    margin: 0;
  }

  section.admin-button-grid div.content-list-wrapper ol.content-list li {
    display: flex;
    flex-direction: row;
    box-sizing: border-box;
    justify-content: center;
    align-items: stretch;
    width: 100%;
  }

  section.admin-button-grid div.content-list-wrapper ol.content-list li a {
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0.5rem 1rem;
    padding: 1rem;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.34);
    border-radius: 0.25rem;
    background: linear-gradient(163deg, rgb(0 0 0 / 47%) 0%, rgb(0 0 0 / 69%) 100%);
    transition: all 333ms;
    aspect-ratio: 16 / 6;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    color: #fff;
    font-size: 1.1rem;
    font-weight: 500;
    text-decoration: none;
    border-bottom: 4px solid;
    display: flex;
    flex: 1;
    flex-direction: column;
    backdrop-filter: brightness(0.85) blur(10px);
    overflow: hidden;
  }

  section.admin-button-grid div.content-list-wrapper ol.content-list li a:hover  {
    color: #00fff9;
  }

  section.admin-button-grid div.content-list-wrapper ol.content-list li a span.icon {
    position: absolute;
    bottom: -4rem;
    right: -1rem;
    font-size: 7rem;
    z-index: 0;
    opacity: 0.5;
  }

  section.admin-button-grid div.content-list-wrapper ol.content-list li a span.label {
    position: relative;
    z-index: 1;
  }

  section.admin-button-grid div.content-list-wrapper ol.content-list li a span.button {
    font-size: 0.9rem;
    background: linear-gradient(to top, #053d58, #28617d);
    padding: 0.5rem 2rem;
    border-radius: 0.5rem;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
    border: 1px solid rgb(26 215 176 / 75%);
    font-size: 0.7rem;
    margin-top: 0.5rem;
    text-transform: uppercase;
    position: relative;
    z-index: 1;
  }

  div.admin-dashboard-grid {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    flex-wrap: nowrap;
    /* margin-top: 4rem; */
    width: 100%;
    position: relative;
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
    color: rgba(255,255,255,0.5);
    text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
    font-weight: 500;
    border-radius: 0.25rem;
    width: 100%;
    margin: 0;
    padding: 0.5rem 0.75rem;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    font-weight: 200;
    box-sizing: border-box;
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
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-end;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.34);
    border-radius: 0.5rem;
    transition: all 333ms;
    backdrop-filter: brightness(0.5) blur(10px);
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell div.cell-inside ul {
    flex: 1;
    margin: 0;
    padding: 0;
    border-radius: 0 0 0.5rem 0.5rem;
    border: none;
    width: 100%;
    box-sizing: border-box;
    border-top: 1px solid rgba(255, 255, 255, 0.5);
    background-color: rgba(0,0,0,0.25);
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell div.cell-inside ul li {
    display: flex;
    flex-direction: column;
    justify-content: stretch;
    align-items: stretch;
    border-bottom: 1px solid rgb(255 255 255 / 30%);
    font-size: 0.85rem;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell div.cell-inside ul li a {
    line-height: 2.5rem;
    display: block;
    text-decoration: none;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow-y: hidden;
    color: #ffffff;
    font-weight: 400;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    padding: 0.25rem 0.75rem;
    transition: all 500ms;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell div.cell-inside ul li a span.icon,
  div.admin-dashboard-grid div.admin-dashboard-grid-cell h2 span {
    color: #ffffff;
    margin-right: 0.5rem;
    font-size: 1.2rem;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell div.cell-inside ul li a span.icon {
    background-color: #fff;
    padding: 0.15rem 0.25rem;
    border-radius: 0.25rem;
    vertical-align: middle;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell div.cell-inside ul li a:hover {
    background: linear-gradient(199deg, #1ad3af, #067b7e);
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell div.cell-inside ul li:last-of-type {
    border-bottom: none;
  }

  div.admin-dashboard-grid div.admin-dashboard-grid-cell {
    margin-bottom: 1.5rem;
  }

  @media only screen and (min-width: 800px) {
    div.admin-dashboard-grid {
      flex-direction: row;
      flex-wrap: wrap;
      width: auto;
      padding: 0 2rem;
      box-sizing: border-box;
    }

    section.admin-button-grid {
      display: flex;
      flex-direction: column;
      align-items: stretch;
      justify-content: flex-start;
      flex-wrap: nowrap;
      width: 100%;
      padding: 0 2rem;
      box-sizing: border-box;
    }

    div.admin-dashboard-grid div.admin-dashboard-grid-cell div.cell-inside {
      margin: 1rem;
    }

    div.admin-dashboard-grid div.admin-dashboard-grid-cell {
      flex: auto;
      min-width: auto;
      max-width: 25%;
      width: 25%;
      margin-bottom: 0;
    }
    
    section.admin-button-grid div.content-list-wrapper ol.content-list {
      flex-direction: row;
      flex-wrap: wrap;
      align-items: stretch;
      justify-content: center;
    }

    section.admin-button-grid div.content-list-wrapper ol.content-list li {
      max-width: 25%;
      width: 25%;
    }

    section.admin-button-grid div.content-list-wrapper ol.content-list li a {
      margin: 1rem;
    }

    section.admin-button-grid div.content-list-wrapper ol.content-list li a {
      margin: 1rem;
    }

    section.admin-button-grid div.content-list-wrapper {
      margin: -1rem 0 1rem;
    }
  }
</style>

<?php

/**
 * Render Admin Dashboard Tile (HTML)
 * 
 * Outputs the HTML for an Admin Dashboard Tile/Card
 * 
 * @param string $icon
 * @param string $pluralLabel Plural Tile Label (e.g. Users)
 * @param string $pluralName Plural Tile Name (e.g. users)
 * @param string $singularLabel Singular Tile Label (e.g. User)
 * @param string $singularName Singular Tile Name (e.g. user)
 */
function renderAdminDashboardTitle (
  string $icon,
  string $pluralLabel,
  string $pluralName,
  string $singularLabel,
  string $singularName
) {

  ?>
  <div class="admin-dashboard-grid-cell">
    <div class="cell-inside">
      <h2>
        <span><?=$icon?></span>
        <?=$pluralLabel?>
      </h2>

      <ul>
        <li>
          <a 
            href="/admin/search/<?=$pluralName?>"
            title="<?=$singularLabel?> Search">
            <span class="icon">🔎</span>
            Search <?=$pluralLabel?>
          </a>
        </li>

        <li>
          <a 
            href="/admin/list/<?=$pluralName?>"
            title="List All <?=$pluralLabel?>">
            <span class="icon">📋</span>
            List All <?=$pluralLabel?>
          </a>
        </li>
        <li>
          <a 
            href="/admin/create/<?=$singularName?>"
            title="Create New <?=$singularLabel?>">
            <span class="icon">✏️</span>
            Create <?=$singularLabel?>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <?php
}
