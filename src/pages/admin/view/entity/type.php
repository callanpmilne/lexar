<?php

require_once('../src/class/Module.php');
require_once("../src/class/ModuleName.php");
require_once('../src/methods/Module/generateSourceFiles.php');
require_once('../src/class/Entities/Detailed/EntityType.php');
require_once('../src/methods/Entity/fetchEntityType.php');

/**
 * View Entity Type Page
 * 
 * Shows a single Entity Type
 */

$pathParts = explode('/', substr(REQUEST_URI, 1));
$TypeID = array_slice($pathParts, -1)[0];

$type = fetchEntityType($TypeID);

$moduleName = new LexarModuleName(
  $type->Name,
);

$module = new LexarModule(
  $moduleName
);

$sourceFiles = $sourceFiles = generateSourceFiles(module: $module);

?>

<main>
  <div id="PageTitle">
    <h1>
      <?=$type->Label?>
      <span>Entity Type</span>
    </h1>

    <p>
      <a href="/admin/list/entity/types">
        &larr; Return to Type List
      </a>
    </p>
  </div>

  <section class="split-content">
    <div class="content-section">
      <section 
        id="EntityTypeDetail"
        class="entity-type-admin-block">
        <h2><?=$type->Label?></h2>
        
        <ul>
          <?php if (isset($type->ParentID)) : ?>
            <li>
              <span class="label">Parent:</span>
              <a href="/admin/view/entity/type/<?=$type->ParentID?>">
                <?=$type->ParentLabel?>
              </a>
            </li>
          <?php endif; ?>

          <li>
            <span class="label">ID:</span>
            <?=$type->ID?>
          </li>

          <li>
            <span class="label">Name:</span>
            <?=$type->Name?>
          </li>

          <li>
            <span class="label">Abstract:</span>
            <?=(true === $type->IsAbstract ? 'true' : 'false')?>
          </li>
        </ul>
      </section>

      <section class="entity-type-admin-block">
        <h2>Attributes</h2>
        
        <ul>
          <li>
            <span class="label">Unique ID</span>
            ID
          </li>

          <li>
            <span class="label">Parent ID</span>
            Parent ID
          </li>

          <li>
            <span class="label">Display Name</span>
            Name
          </li>
        </ul>
      </section>
    </div>

    <div class="content-section">
      <section id="EntityTypeExplorer">
        <h2>Entity Type Code Generator</h2>

        <div class="entity-type-explorer">
          <div class="file-browser">
            <?php foreach ($sourceFiles as $uri => $src) : ?>
              <div 
                class="file-browser-file">
                <?=$uri?>
              </div>
            <?php endforeach; ?>
          </div>
          
          <div class="file-view">
            <?php foreach ($sourceFiles as $uri => $src) : ?>
              <div 
                class="entity-type-code-preview">
                <label class="output">
                  <pre class="source-file-path"><?=$uri?></pre>
                </label>

                <?=highlight_string(
                  html_entity_decode($src), 
                  true
                )?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    </div>
  </section>
</main>

<script>
  "use strict";
  (function ($) {
    var $document = $.document;
    var $codePreviewEls = $document.querySelectorAll('.entity-type-code-preview');
    var $fileBrowserFileEls = $document.querySelectorAll('.file-browser-file');

    // Bind File Browser File Clicks
    $fileBrowserFileEls.forEach(($el) => {
      const srcFilePath = $el.innerText;
      $el.addEventListener('click', () => {
        showPreview(srcFilePath);
      });
    });
    
    // Hide the code previews
    $codePreviewEls.forEach(($el) => {
      console.log($el);
      $el.classList.add('hidden');
    });

    $codePreviewEls[0].classList.remove('hidden');
    
    function showPreview (srcFilePath) {
      $codePreviewEls.forEach(($el) => {
        if (srcFilePath === $el.querySelector('pre.source-file-path').innerText) {
          $el.classList.remove('hidden');
          return;
        }

        if ($el.classList.contains('hidden')) {
          return;
        }

        $el.classList.add('hidden');
      });
    }
  })(window);
</script>

<style>
  section.split-content {
    display: flex;
    flex: 1;
    align-items: flex-start;
    justify-content: flex-start;
    flex-direction: column;
  }

  section.split-content div.content-section {
    display: flex;
    flex-direction: column;
    flex: 1;
    align-items: stretch;
    justify-content: stretch;
  }

  section.split-content div.content-section section {
    display: flex;
    flex-direction: column;
    flex: 1;
    align-items: stretch;
    justify-content: stretch;
    width: 100%;
  }

  #EntityTypeExplorer div.entity-type-explorer {
    display: flex;
    flex-direction: column;
    
  }
  
  #EntityTypeExplorer div.entity-type-code-preview {
    display: flex;
    flex: 1;
    flex-direction: column;
  }
  
  #EntityTypeExplorer div.entity-type-code-preview.hidden {
    display: none;
  }

  #EntityTypeExplorer div.entity-type-code-preview pre {
    font-size: 0.7rem;
    backdrop-filter: brightness(0.8) blur(50px);
    margin: 0;
    flex: 1;
    overflow: scroll;
    padding: 0.5rem;
    width: 100%;
    box-sizing: border-box;
  }
  
  #EntityTypeExplorer div.entity-type-code-preview pre.source-file-path {
    backdrop-filter: brightness(0.5) blur(50px);
    font-size: 0.9rem;
    padding: 0.5rem;
  }
  
  #EntityTypeExplorer div.entity-type-code-preview pre code {
    width: 100%;
  }

  #EntityTypeExplorer div.entity-type-explorer div.file-browser {
    max-width: 20vw;
    overflow: scroll;
    backdrop-filter: brightness(0.35);
    display: flex;
    flex-direction: column;
    box-shadow: inset 1px 1px 10px rgba(0,0,0,0.25);
    padding: 0.25rem 0;
  }

  #EntityTypeExplorer div.entity-type-explorer div.file-browser div.file-browser-file {
    padding: 0.5rem 0.75rem;
    box-sizing: border-box;
    font-size: 0.9rem;
    display: flex;
    flex-direction: column;
    color: rgba(255, 255, 255, 0.75);
    font-weight: 100;
    cursor: pointer;
  }

  #EntityTypeExplorer div.entity-type-explorer div.file-browser div.file-browser-file:hover {
    color: rgba(255,255,255,1);
    background: linear-gradient(to bottom, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0.5) 100%);
  }

  #EntityTypeExplorer h2 {
    margin: 0;
    padding: 1rem;
    backdrop-filter: brightness(0.5);
  }

  section.entity-type-admin-block {
    backdrop-filter: brightness(0.5);
    border-radius: 0.5rem;
    overflow: hidden;
    margin-bottom: 2rem;
  }
  section.entity-type-admin-block h2, 
  section.entity-type-admin-block h3,
  section.entity-type-admin-block ul {
    padding: 1rem 1.5rem 0;
  }
  section.entity-type-admin-block h2, 
  section.entity-type-admin-block h3 {
    font-size: 1.2rem;
    margin-top: 0;
    margin-bottom: 0;
  }
  section.entity-type-admin-block h2 {
    
  }
  section.entity-type-admin-block h3 {
    margin-top: 0;
  }
  h1 span {
    font-weight: 200;
  }
  
  section.entity-type-admin-block ul {
    list-style-type: none;
    border-top: 1px solid;
    font-size: 0.9rem;
    line-height: 2;
  }
  
  section.entity-type-admin-block ul li {
    display: flex;
    flex-direction: column;
  }
  
  section.entity-type-admin-block ul li span {
    font-size: 0.7rem;
    color: rgba(255,255,255,0.5);
  }
  
  @media only screen and (min-width: 800px) {
    section.split-content {
      flex-direction: row;
      max-width: var(--desktop-content-max-width);
      width: var(--desktop-content-width);
    }
    section.split-content div.content-section:nth-of-type(1) {
      flex: 1;
      width: 20vw;
      min-width: 20vw;
    }
    section.split-content div.content-section:nth-of-type(2) {
      flex: 3;
      margin-left: 2rem;
    }

    section.split-content div.content-section section {
    }

    #EntityTypeExplorer div.entity-type-explorer {
      flex-direction: row-reverse;
      justify-content: flex-end;
      align-items: stretch;
    }

    #EntityTypeExplorer div.entity-type-explorer div.file-view {
      display: flex;
      flex-direction: column;
      align-items: stretch;
      justify-content: stretch;
      flex: 1;
    }

    #EntityTypeExplorer div.entity-type-explorer div.file-browser {
      max-width: 20vw;
    }

    #EntityTypeExplorer div.entity-type-code-preview pre {
      max-height: 80vh;
      max-width: 41vw;
    }



    
  }
</style>