<?php
/**
 * Saerch Page
 */
?>

<main>
  <div id="PageTitle">
    <?php if (array_key_exists('query', $_REQUEST)) : ?>
      <h1>Search for <?=$_REQUEST['query']?></h1>
    <?php else : ?>
      <h1>Search</h1>
    <?php endif; ?>
  </div>

  <section id="SearchInputContainer">
    <form 
      action="/search" 
      method="GET">
      <input id="SearchInput"
        type="input"
        name="query"
        placeholder="Enter Search Term or Keywords ..."
        value="<?=array_key_exists('query', $_REQUEST) ? $_REQUEST['query'] : ''?>"
        tabindex="1" />
      
      <button id="SearchSubmit">
        Search
      </button>
    </form>
  </section>

  <?php if (array_key_exists('query', $_REQUEST)) : ?>
  <section class="content-grid">
    <h2>Videos</h2>

    <div class="content-list-wrapper">
      <ol class="content-list">
        <?php for ($i = 0; $i < 8; $i++) : ?>
          <li>
            <a href="/video/<?=substr(md5(uniqid()),0,8)?>">
              <span style="font-size: 2.5rem;color:#1cdfb5;">&#9654;</span>
              Video #<?=$i?>
              <span><?=$_REQUEST['query']?> Video #<?=$i?> &rarr;</span>
              
              <div class="item-info">
                <div>
                  <span>1m 35s</span>
                  <span>Posted 3 Minutes Ago</span>
                </div>

                <div>
                  <span></span>
                  <span>By @testuser</span>
                </div>
              </div>
            </a>
          </li>
        <?php endfor; ?>
      </ol>
    </div>
  </section>

  <section class="content-grid">
    <h2>Posts</h2>
    
    <div class="content-list-wrapper">
      <ol class="content-list">
        <?php for ($i = 0; $i < 8; $i++) : ?>
          <li>
            <a href="/post/<?=substr(md5(uniqid()),0,8)?>">
              <span style="font-size: 2.5rem;color:#1cdfb5;">&#9654;</span>
              Post #<?=$i?>
              <span><?=$_REQUEST['query']?> Post #<?=$i?> &rarr;</span>

              <div class="item-info">
                <div>
                  <span>1m 35s</span>
                  <span>Posted 3 Minutes Ago</span>
                </div>

                <div>
                  <span></span>
                  <span>By @testuser</span>
                </div>
              </div>
            </a>
          </li>
        <?php endfor; ?>
      </ol>
    </div>
  </section>

  <section class="content-grid">
    <h2>Pics</h2>
    
    <div class="content-list-wrapper">
      <ol class="content-list">
        <?php for ($i = 0; $i < 8; $i++) : ?>
          <li>
            <a href="/pic/<?=substr(md5(uniqid()),0,8)?>">
              <span style="font-size: 2.5rem;color:#1cdfb5;">&#9654;</span>
              Pic #<?=$i?>
              <span><?=$_REQUEST['query']?> Pic #<?=$i?> &rarr;</span>
              
              <div class="item-info">
                <div>
                  <span>1280x1024</span>
                  <span>Posted 3 Minutes Ago</span>
                </div>

                <div>
                  <span></span>
                  <span>By @testuser</span>
                </div>
              </div>
            </a>
          </li>
        <?php endfor; ?>
      </ol>
    </div>
  </section>
  <?php endif; ?>
</main>

<script>
  (function ($) {
    $.document.getElementById('SearchInput').focus();
  })(window);
</script>

<style>
  #SearchInputContainer {

  }
</style>
