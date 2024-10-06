<?php
/**
 * View Picture Page
 */

$pathParts = explode('/', substr(REQUEST_URI, 1));
$PicID = array_slice($pathParts, -1)[0];

?>

<main>
  <div id="Pic">
    <article
      id="PicViewer">

      <div class="viewer">
        
      </div>

      <div id="PicDetails">
        <h1>
          <a href="/pic/<?=$PicID?>">Pic &lt;<?=$PicID?>&gt;</a>
        </h1>
      </div>

      <?php include('../src/common/page/comments.php'); ?>

    </article>

    <?php include('../src/common/page/sidebar.php'); ?>
  </div>
</main>

<style>
  #Pic {
    display: flex;
    flex-direction: row;
    align-items: stretch;
    justify-content: flex-start;
    width: 100%;
  }

  #PicViewer {
    display: flex;
    flex-direction: column;
    width: 100%;
    align-items: stretch;
    justify-content: flex-start;
  }

  #PicDetails {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 1.5rem 1rem;
  }

  #PicViewer div.viewer {
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0.5rem 1rem;
    padding: 1rem;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.34);
    border-radius: 0.25rem;
    background: linear-gradient(163deg, rgb(0 0 0 / 47%) 0%, rgb(0 0 0 / 69%) 100%);
    transition: all 333ms;
    aspect-ratio: 4 / 3;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    color: #fff;
    font-size: 1.1rem;
    font-weight: 500;
    text-decoration: none;
    border-bottom: 4px solid;
    display: flex;
    flex-direction: column;
    backdrop-filter: brightness(0.85) blur(10px);
    overflow: hidden;
  }

  @media screen and (min-width: 800px) {
    #Pic {
      margin-top: 4rem;
    }

    #PicViewer {
      flex: 1;
      width: auto;
    }
  }
</style>
