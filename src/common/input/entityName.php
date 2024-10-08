<?php

function entityNameFields(
  $initialTabIndex = 2
) {
  $g = [
    "tabIndex" => $initialTabIndex,
  ];

  ?>
  <div 
    class="component-form-field">
    <label
      for="CreateEntityTypeInputLabel">
      Display Name (Label)
    </label>

    <input 
      id="CreateEntityTypeInputLabel"
      name="label"
      type="input"
      tabindex="<?=nextTabIndex($g)?>"
      placeholder="E.g. Hair Color" />
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreateEntityTypeInputNiceName">
      Nice Name
    </label>

    <input 
      id="CreateEntityTypeInputNiceName"
      name="niceName"
      type="input"
      tabindex="<?=nextTabIndex($g)?>"
      placeholder="E.g. haircolor" />
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreateEntityTypeInputPascalCaseName">
      PascalCase Name
    </label>

    <input 
      id="CreateEntityTypeInputPascalCaseName"
      name="pascalCaseName"
      type="input"
      tabindex="<?=nextTabIndex($g)?>"
      placeholder="E.g. HairColor" />
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreateEntityTypeInputCamelCase">
      Camel Case Name
    </label>

    <input 
      id="CreateEntityTypeInputCamelCase"
      name="camelCaseName"
      type="input"
      tabindex="<?=nextTabIndex($g)?>"
      placeholder="E.g. hairColor" />
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreateEntityTypeInputSnakeCase">
      Snake Case Name
    </label>

    <input 
      id="CreateEntityTypeInputSnakeCase"
      name="camelCaseName"
      type="input"
      tabindex="<?=nextTabIndex($g)?>"
      placeholder="E.g. hair-color" />
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreateEntityTypeInputSnakeCase">
      Plural Replacements
    </label>

    <input 
      id="CreateEntityTypeInputSnakeCase"
      name="camelCaseName"
      type="input"
      tabindex="<?=nextTabIndex($g)?>"
      placeholder="E.g. hair-color"
      value="y$/=ies,mouse$/=mice" />
  </div>

  <?php

}

function nextTabIndex ($g) {
  $g['tabIndex'] = $g['tabIndex'] + 1;
  return $g['tabIndex'];
}


