<!doctype html>
<html lang="en-au">
<head>
  <title>Lexar</title>
  <link
    rel="stylesheet"
    href="/style.css" />
</head>

<body>
  <header>
    <ul id="topmenu">
      <li>
        <a 
          href="/">
          Home
        </a>
      </li>
      <li>
        <a
          href="/login">
          Login
        </a>
      </li>
      <li>
        <a 
          href="/categories">
          Categories
        </a>
      </li>
      <li>
        <a 
          href="/404">
          404
        </a>
      </li>
    </ul>
  </header>

  <style>
    header {
      height: 2.5rem;
      font-size: 0.9rem;
      font-weight: 400;
      background-color: #222;
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

    #topmenu li {
      display: flex;
      color: #ffffff50;
    }

    #topmenu li::after {
      content: '|';
      display: flex;
      margin: 0 0.5rem;
    }

    #topmenu li:last-of-type::after {
      content: '';
      margin: 0;
    }

    #topmenu li a {
      color: #fff;
    }
  </style>