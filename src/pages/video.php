<?php
/**
 * View Video Page
 */

$pathParts = explode('/', substr(REQUEST_URI, 1));
$VideoID = array_slice($pathParts, -1)[0];

?>

<main>
  <div id="Video">
    <article
      id="VideoPlayer">

      <div class="player">
        <video controls loop autoplay poster>
          <source src="/test.mp4"
            type="video/mp4">
          Your browser does not support the &lt;video&gt; tag
        </video>
      </div>

      <div id="VideoDetails">
        <h1>
          <a href="/video/<?=$VideoID?>">Video &lt;<?=$VideoID?>&gt;</a>
        </h1>
      </div>

      <?php include('../src/common/page/comments.php'); ?>

    </article>

    <?php include('../src/common/page/sidebar.php'); ?>
  </div>
</main>

<style>
  #Video {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    width: 100%;
  }

  #VideoPlayer {
    display: flex;
    flex-direction: column;
    width: 100%;
    align-items: stretch;
    justify-content: flex-start;
  }

  #VideoDetails {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 1.5rem 1rem;
  }

  #VideoDetails a {
    text-decoration: none;
  }

  #VideoPlayer div.player {
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0.5rem 1rem;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.34);
    border-radius: 0.25rem;
    background: linear-gradient(163deg, rgb(0 0 0 / 47%) 0%, rgb(0 0 0 / 69%) 100%);
    transition: all 333ms;
    aspect-ratio: 16 / 9;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    color: #fff;
    font-size: 1.1rem;
    font-weight: 500;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    backdrop-filter: brightness(0.85) blur(10px);
    overflow: hidden;
  }

  #VideoPlayer div.player video {
    max-width: 100%;
    max-height: 100%;
  }

  @media screen and (min-width: 800px) {
    #Video {
      flex-direction: row;
      align-items: stretch;
      justify-content: flex-start;
      width: 100%;
      margin-top: 4rem;
    }

    #VideoPlayer {
      flex: 1;
      width: auto;
    }
  }
</style>