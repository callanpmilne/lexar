<?php

/**
* Create Organisation Form Component
*/

include('../src/common/input/uuid.php');

?>

<div 
  class="component-form alt-form">

  <?=uuidField(1, 'Organisation ID')?> 

  <div 
    class="component-form-field">
    <label
      for="CreateOrganisationInputName">
      Organisation Name
    </label>

    <input 
      id="CreateOrganisationInputName"
      name="organisationName"
      type="input"
      tabindex="2" />
  </div>

  <div
    class="component-form-buttons">

    <div style="display: flex; flex: 1;"></div>

    <button
      type="submit">
      Create
    </button>

    <input
      name="is_create_organisation_submit"
      type="hidden"
      value="1" />
  </div>
</div>

<style>
  main {
    align-items: center;
  }
</style>
  