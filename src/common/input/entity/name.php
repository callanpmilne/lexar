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
      value="<?=getRequestVar('label')?>"
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
      value="<?=getRequestVar('niceName')?>"
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
      value="<?=getRequestVar('pascalCaseName')?>"
      type="input"
      tabindex="<?=nextTabIndex($g)?>"
      placeholder="E.g. HairColor" />
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreateEntityTypeInputCamelCaseName">
      Camel Case Name
    </label>

    <input 
      id="CreateEntityTypeInputCamelCaseName"
      name="camelCaseName"
      value="<?=getRequestVar('camelCaseName')?>"
      type="input"
      tabindex="<?=nextTabIndex($g)?>"
      placeholder="E.g. hairColor" />
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreateEntityTypeInputSnakeCaseName">
      Snake Case Name
    </label>

    <input 
      id="CreateEntityTypeInputSnakeCaseName"
      name="snakeCaseName"
      value="<?=getRequestVar('snakeCaseName')?>"
      type="input"
      tabindex="<?=nextTabIndex($g)?>"
      placeholder="E.g. hair-color" />
  </div>

  <div 
    class="component-form-field">
    <label
      for="CreateEntityTypeInputPluralReplacements">
      Plural Replacements
    </label>

    <input 
      id="CreateEntityTypeInputPluralReplacements"
      name="pluralReplacements"
      value="<?=getRequestVar('pluralReplacements') ?? 'y$/=ies,r$/=rs'?>"
      type="input"
      tabindex="<?=nextTabIndex($g)?>"
      placeholder="E.g. 'y$/=ies,r$/=rs'" />
  </div>

<script>
  "use strict";
  (function ($) {

    const $labelInputEl = $getElemByID('Label');
    const $CreateEntityTypeInputNiceName = $getElemByID('NiceName');
    const $CreateEntityTypeInputPascalCaseName = $getElemByID('PascalCaseName');
    const $CreateEntityTypeInputCamelCase = $getElemByID('CamelCaseName');
    const $CreateEntityTypeInputSnakeCase = $getElemByID('SnakeCaseName');

    $labelInputEl.addEventListener('input', onLabelElInput);

    function onLabelElInput ($e) {
      let value = $e.target.value;
      updateValues(value);
    }

    function updateValues (source) {
      const v = source.replace(/\s/g, '');
      $CreateEntityTypeInputNiceName.value = v.toLowerCase();
      $CreateEntityTypeInputPascalCaseName.value = v;
      $CreateEntityTypeInputCamelCase.value = lcfirst(v);
      $CreateEntityTypeInputSnakeCase.value = source.replace(/\s/g, '-').toLowerCase();//.replace(/([A-Z])/);
    }

    function $getElemByID (elemID) {
      return $.document.getElementById('CreateEntityTypeInput' + elemID);
    }

    function lcfirst (str) {
      return str[0].toLowerCase() + str.substring(1);
    }
  })(window);
</script>

  <?php

}

function nextTabIndex ($g) {
  $g['tabIndex'] = $g['tabIndex'] + 1;
  return $g['tabIndex'];
}

function getRequestVar (
  string $name
): string {
  return htmlspecialchars($_REQUEST[$name] ?? '', ENT_QUOTES);
}


