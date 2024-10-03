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
</head>

<body>
  <header>
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
      </li>

      <?php $globalSession = $GLOBALS["sess"]; ?>

      <?php if (!$globalSession->getSession()->isLoggedIn()) : ?>
        <li>
          <a
            href="/login">
            Login
          </a>

          <div class="submenu">

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
                    <a href="/admin/tools/uuid/generator">
                      UUID Generator
                    </a>
                  </li>

                  <li>
                    <a href="/password/hasher">
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
                <strong>Customer Relationships</strong>
                
                <ul>
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
                    <a href="/admin/list/metadata">
                      Meta Tags
                    </a>
                  </li>

                  <li>
                    <a href="/admin/list/types">
                      Types
                    </a>
                  </li>
                </ul>
              </section>
            </div>
          </div>
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
                    <a href="/my/profile">
                      👤 My Profile
                    </a>
                  </li>

                  <li>
                    <a href="/admin/list/notes">
                      📲 Downloads
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
                      🔑 Logout
                    </a>
                  </li>
                </ul>
              </section>
            </div>
          </div>
        </li>
      <?php endif; ?>

      <li>
        <span style="font-size: 0.8rem;position:fixed;top:0.5rem;right:0.5rem;"><?=$globalSession->getSession()->ID?></span>
      </li>
    </ul>
  </header>

  <style>
    header {
      height: 3.5rem;
      font-size: 0.9rem;
      font-weight: 400;
      background-color: #012e39;
      box-shadow: 0px 0px 5px rgba(0,0,0,0.5);
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
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
      line-height: 2rem;
      padding: 0 0.5rem;
    }

    #topmenu li div.submenu {
      position: absolute;
      left: -25vw;
      top: 2rem;
      display: flex;
      flex-direction: column;
      background-color: rgba(0, 0, 0, 0.85);
      color: #fff;
      padding: 1rem 0.5rem;
      display: none;
      width: 40vw;
      border-radius: 0.5rem;
      padding-top: 1rem;
      border-top: 2px solid #1ad0a9;
      border-bottom: 2px solid;
      z-index: 10;
    }

    #topmenu li div.submenu div.submenuSections {
      display: flex;
      flex-direction: row;
    }

    #topmenu li div.submenu span.menutitle {
      padding: 0 0.5rem;
      color: #ffffff50;
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
      font-size: 0.75rem;
    }

    #topmenu li:hover div.submenu {
      display: flex;
    }

    #topmenu > li:hover > a {
      background-color: #1ad0a9;
      border-radius: 0.25rem 0.25rem 0 0;
      color: #fff;
    }
  </style>