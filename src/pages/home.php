<?php
/**
 * Home Page
 */
?>

<main>
  <div id="PageTitle">
    <h1>Welcome to Lexar!</h1>
  <p>
    A <em>really great</em> PHP Web Application, by 
    <a href="https://github.com/callanpmilne">Callan P Milne</a>.
  </p>
  </div>

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
