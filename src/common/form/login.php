<?php
/**
 * User Login Form Component
 */

$values = array(
  "username" => array_key_exists('username', $_POST) ? $_POST['username'] : '',
);

$redirectUrl = '';

if (array_key_exists('redirect', $_REQUEST)) {
  $redirectUrl = $_REQUEST['redirect'];
}

?>

<div 
  class="component-form-login">
  <div 
    class="component-form-login-field">
    <label
      for="AuthInputUsername">
      Username
    </label>

    <input 
      id="AuthInputUsername"
      type="input"
      name="username"
      value="<?=$values['username']?>"
      tabindex="2" />
  </div>

  <div
    class="component-form-login-field">
    <label
      for="AuthInputPassword">
      Password
    </label>

    <input 
      id="AuthInputPassword"
      type="password"
      name="password"
      tabindex="3" />
  </div>

  <div
    class="component-form-login-buttons">
    <label>
      <input
        type="checkbox"
        name="remember"
        value="1"
        tabindex="4" />

      <span>
        Remember Me
      </span>
    </label>

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit"
      tabindex="5">
      Login
    </button>

    <input
      name="is_login_submit"
      type="hidden"
      value="1" />

    <input
      name="redirect"
      type="hidden"
      value="<?=$redirectUrl?>" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }

  div.component-form-login {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    min-width: 20rem;
    max-width: 30vw;
  }

  div.component-form-login div.component-form-login-field {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    padding: 0.5rem 0;
  }

  div.component-form-login div.component-form-login-buttons {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    height: 2.5rem;
  }

  div.component-form-login div.component-form-login-buttons > * {
    cursor: pointer;
  }
</style>
