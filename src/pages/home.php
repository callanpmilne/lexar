<?php
/**
 * Home Page
 */
?>

<main>
  <div id="PageTitle">
    <h1>Welcome Home!</h1>
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

  <section class="content-grid">
    <h2>Recent Videos</h2>

    <div class="content-list-wrapper">
      <ol class="content-list">
        <?php for ($i = 0; $i < 8; $i++) : ?>
          <li>
            <a href="/video/<?=substr(md5(uniqid()),0,8)?>">
              <span style="font-size: 2.5rem;color:#1cdfb5;">&#9654;</span>
              Video #<?=$i?>
              <span>View Recent Video #<?=$i?> &rarr;</span>
              
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
    <h2>Recent Posts</h2>
    
    <div class="content-list-wrapper">
      <ol class="content-list">
        <?php for ($i = 0; $i < 8; $i++) : ?>
          <li>
            <a href="/post/<?=substr(md5(uniqid()),0,8)?>">
              <span style="font-size: 2.5rem;color:#1cdfb5;">&#9654;</span>
              Post #<?=$i?>
              <span>View Recent Post #<?=$i?> &rarr;</span>

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
    <h2>Recent Pics</h2>
    
    <div class="content-list-wrapper">
      <ol class="content-list">
        <?php for ($i = 0; $i < 8; $i++) : ?>
          <li>
            <a href="/pic/<?=substr(md5(uniqid()),0,8)?>">
              <span style="font-size: 2.5rem;color:#1cdfb5;">&#9654;</span>
              Pic #<?=$i?>
              <span>View Recent Pic #<?=$i?> &rarr;</span>
              
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
