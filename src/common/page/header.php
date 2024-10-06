<!doctype html>
<html lang="en-au">
<head>
  <title>Lexar</title>

  <link
    rel="stylesheet"
    href="/style.css" />
  
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0">
  
  <!-- Google Fonts -->
  <!-- <link
    rel="preconnect"
    href="https://fonts.googleapis.com">
  <link
    rel="preconnect"
    href="https://fonts.gstatic.com"
    crossorigin>
  <link 
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"> -->
  <!-- Google Fonts -->

</head>

<body>
  <header id="pageHeader">
    <ul id="topmenu">
      <li>
        <a 
          href="/">
          🏠 Home
        </a>
      </li>

      <li>
        <a 
          href="/categories">
          🏷️ Categories
        </a>
        
        <div class="submenu">
          <span class="menutitle">
            🏷️ Categories
          </span>

          <ul class="tagcloud">
            <?php require_once('../src/class/Category.php'); ?>
            <?php require_once('../src/methods/Category/fetchCategoryList.php'); ?>
            <?php $categories = fetchCategoryList(); ?>
            <?php foreach ( $categories as $cat ) : ?>
              <li class="tag">
                <a href="/categories/<?=$cat->Path?>">
                  <?=$cat->Name?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </li>

      <?php $globalSession = $GLOBALS["sess"]; ?>

      <?php if (!$globalSession->getSession()->isLoggedIn()) : ?>
        <li>
          <a
            href="/login">
            🔐 Login
          </a>
        </li>
      <?php endif; ?>

      <?php if ($globalSession->getSession()->isLoggedIn()) : ?>
        <li>
          <a 
            href="/my/account">
            🔐 My Account
          </a>

          <div class="submenu">
            <span class="menutitle">
              🔐 My Account Menu
            </span>

            <div class="submenuSections">
              <section>
                <strong>Your Stuff</strong>

                <ul>
                  <li>
                    <a href="/my/wishlist">
                      🛍️ Wishlist
                    </a>
                  </li>

                  <li>
                    <a href="/my/files">
                      📲 My Files
                    </a>
                  </li>

                  <li>
                    <a href="/my/profile">
                      👤 My Profile
                    </a>
                  </li>

                  <li>
                    <a href="/my/saved">
                      ⭐ Saved Items
                    </a>
                  </li>
                </ul>
              </section>
              
              <section>
                <strong>Billing &amp; Accounts</strong>
                
                <ul>

                  <li>
                    <a href="/my/payments">
                      💳 Payments
                    </a>
                  </li>

                  <li>
                    <a href="/my/transactions">
                      ⚖️ Transactions
                    </a>
                  </li>

                  <li>
                    <a href="/my/orders">
                      📦 Track My Order
                    </a>
                  </li>

                  <li>
                    <a href="/create/order">
                      🛒 Create New Order
                    </a>
                  </li>
                </ul>
              </section>
              
              <section>
                <strong>Safety &amp; Security</strong>
                
                <ul>
                  <li>
                    <a href="/my/settings">
                      🛠 Site Settings
                    </a>
                  </li>

                  <li>
                    <a href="/update/contact">
                      📇 Update Contact
                    </a>
                  </li>

                  <li>
                    <a 
                      href="/change/password">
                      ✏️ Change Password
                    </a>
                  </li>
                  
                  <li>
                    <a 
                      href="/logout">
                      🔑 End Session (Logout)
                    </a>
                  </li>
                </ul>
              </section>
            </div>
          </div>
        </li>
      <?php endif; ?>

      <?php if ($globalSession->getSession()->isLoggedIn() && $globalSession->getUser()->IsSuperAdmin) : ?>
        <li>
          <a 
            href="/admin">
            ⚙️ Site Admin
          </a>

          <div class="submenu">
            <span class="menutitle">
              ⚙️ Site Admin Menu
            </span>

            <div class="submenuSections">
              <section>
                <strong>Tools</strong>

                <ul>
                  <li>
                    <a href="/admin/tools/code/writer">
                      Code Writer
                    </a>
                  </li>

                  <li>
                    <a href="/admin/tools/uuid/generator">
                      UUID Generator
                    </a>
                  </li>

                  <li>
                    <a href="/admin/tools/password/hasher">
                      Password Hasher
                    </a>
                  </li>

                  <li>
                    <a href="/admin/tools/password/generator">
                      Password Generator
                    </a>
                  </li>

                  <li>
                    <a href="/admin/tools/timestamp/converter">
                      Timestamp Converter
                    </a>
                  </li>
                </ul>
              </section>
              
              <section>
                <strong>Relationships</strong>
                
                <ul>
                  <li>
                    <a href="/admin/list/orgs">
                      Organisations
                    </a>
                  </li>

                  <li>
                    <a href="/admin/list/customers">
                      Customers
                    </a>
                  </li>

                  <li>
                    <a href="/admin/list/payments">
                      Payments
                    </a>
                  </li>

                  <li>
                    <a href="/admin/list/notes">
                      Notes
                    </a>
                  </li>

                  <li>
                    <a href="/admin/list/interactions">
                      Interactions
                    </a>
                  </li>
                </ul>
              </section>
              
              <section>
                <strong>Site Content</strong>
                
                <ul>
                  <li>
                    <a href="/admin/list/categories">
                      Categories
                    </a>
                  </li>

                  <li>
                    <a href="/admin/list/types">
                      Content-Types
                    </a>
                  </li>

                  <li>
                    <a href="/admin/list/metadata">
                      Page Meta-Tags
                    </a>
                  </li>
                </ul>
              </section>
            </div>
          </div>
        </li>
      <?php endif; ?>

      <!--<li>
        <span style="font-size: 0.8rem;position:fixed;top:0.5rem;right:0.5rem;"><?=$globalSession->getSession()->ID?></span>
      </li>-->
    </ul>
  </header>

  <style>
    header#pageHeader {
      height: 3.5rem;
      font-size: 0.9rem;
      /* background-color: #012e39; */
      box-shadow: 0px 0px 5px rgba(0,0,0,0.5);
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10;
      font-family: "Open Sans", sans-serif;
      font-weight: 500;
      backdrop-filter: brightness(0.25) blur(10px);
    }

    #topmenu {
      list-style-type: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
    }

    #topmenu > li {
      display: flex;
      color: #ffffff50;
      position: relative;
    }

    #topmenu > li:last-of-type > a {
      border-right: none;
    }

    #topmenu > li > a {
      color: #1ad0a9;
      text-decoration: none;
      line-height: 3.5rem;
      padding: 0 0.75rem;
    }

    #topmenu > li:hover > a {
      color: #fff;
      background: linear-gradient(199deg, #1ad3af, #067b7e);
      text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
    }

    #topmenu li div.submenu {
      position: absolute;
      left: -15vw;
      top: 3.5rem;
      display: flex;
      flex-direction: column;
      background-color: rgba(0, 0, 0, 0.85);
      color: #fff;
      padding: 1rem 0.5rem;
      display: none;
      width: 40vw;
      border-radius: 0 0 0.5rem 0.5rem;
      padding-top: 1rem;
      border-top: 2px solid #1ad0a9;
      border-bottom: none;
      z-index: 10;
      box-shadow: 1px 1px 5px rgba(0,0,0,0.5);
    }

    #topmenu li div.submenu div.submenuSections {
      display: flex;
      flex-direction: row;
    }

    #topmenu li div.submenu span.menutitle {
      padding: 0 0.5rem;
      color: #ffffff;
      margin-bottom: 1rem;
    }

    #topmenu li div.submenu section {
      display: flex;
      flex: 1;
      margin: 0 0.5rem;
      flex-direction: column;
    }

    #topmenu li div.submenu strong {
      font-weight: 500;
      font-size: 0.8rem;
      /* border-bottom: 1px solid; */
      margin-bottom: 0.5rem;
      color: #ffffff75;
    }

    #topmenu li div.submenu ul {
      padding: 0;
    }

    #topmenu li div.submenu ul li {
      display: flex;
      align-items: stretch;
      justify-content: stretch;
    }

    #topmenu li div.submenu ul li a {
      white-space: nowrap;
      /* border-bottom: 1px solid; */
      flex: 1;
      line-height: 2rem;
      color: #fff;
      text-decoration: none;
      font-size: 0.875rem;
    }

    #topmenu li:hover div.submenu {
      display: flex;
    }

    #topmenu div.submenu ul.tagcloud {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      align-items: flex-start;
      justify-content: flex-start;
    }

    #topmenu div.submenu ul.tagcloud li.tag {
      display: flex;
    }

    #topmenu div.submenu ul.tagcloud li.tag a {
      display: flex;
      flex: 1;
      align-items: center;
      justify-content: center;
      padding: 0.5rem;
      line-height: 1;
      font-size: 0.9rem;
      text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
      border-radius: 0.25rem;
    }

    #topmenu div.submenu ul.tagcloud li.tag a:hover {
      background: linear-gradient(199deg, #1ad3af, #067b7e);
      color: #fff;
    }

    #topmenu > li > a {
      white-space: nowrap;
      max-width: 1.8rem;
      overflow: hidden;
      font-size: 2rem;
    }

    @media screen and (min-width: 800px) {
      #topmenu > li > a {
        max-width: none;
        font-size: 0.9rem;
      }
    }
  </style>