<?php
/**
 * User Login Form Component
 */
?>

<div 
  class="component-form-login">
  <div 
    class="component-form-login-field">
    <label
      for="AuthInputEmailAddress">
      Email Address
    </label>

    <input 
      id="AuthInputEmailAddress"
      name="emailAddress"
      type="input"
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
      name="password"
      type="password"
      tabindex="3" />
  </div>

  <div
    class="component-form-login-buttons">
    <label>
      <input
        type="checkbox"
        name="remember"
        value="1" />

      <span>
        Remember Me
      </span>
    </label>

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit">
      Login
    </button>

    <input
      name="is_login_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
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