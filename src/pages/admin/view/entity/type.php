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
      <section id="EntityTypeDetail">
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
    </div>

    <div class="content-section">
      <section id="EntityTypeExplorer">
        <h2>Entity Type Explorer</h2>

        <div class="entity-type-explorer">
          <h3>Code Preview</h3>

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
      </section>
    </div>
  </section>
</main>

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
    margin-bottom: 2rem;
  }
  
  #EntityTypeExplorer div.entity-type-code-preview pre {
    margin: 0;
  }
  
  #EntityTypeExplorer div.entity-type-code-preview pre.source-file-path {
    backdrop-filter: brightness(0.5) blur(50px);
    font-size: 0.9rem;
    padding: 0.5rem;
  }
  
  #EntityTypeExplorer div.entity-type-code-preview pre code {
    font-size: 0.7rem;
    backdrop-filter: brightness(0.8) blur(50px);
    display: block;
    height: 10rem;
    overflow: scroll;
    padding: 0.5rem;
  }

  #EntityTypeDetail {
    backdrop-filter: brightness(0.5);
    border-radius: 0.5rem;
    overflow: hidden;
  }
  #EntityTypeDetail h2, 
  #EntityTypeDetail h3,
  #EntityTypeDetail ul {
    padding: 1rem 1.5rem 0;
  }
  #EntityTypeDetail h2, 
  #EntityTypeDetail h3 {
    font-size: 1.2rem;
    margin-top: 0;
    margin-bottom: 0;
  }
  #EntityTypeDetail h2 {
    
  }
  #EntityTypeDetail h3 {
    margin-top: 0;
  }
  #EntityTypeDetail h1 span {
    color: var(--color);
  }
  
  #EntityTypeDetail ul {
    list-style-type: none;
    border-top: 1px solid;
    font-size: 0.9rem;
    line-height: 2;
  }
  
  #EntityTypeDetail ul li {
    display: flex;
    flex-direction: column;
  }
  
  #EntityTypeDetail ul li span {
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

    
  }
</style>