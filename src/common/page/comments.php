<?php

require_once("../src/class/Content/Comment.php");

$comments = [];

$numComments = random_int(1, 10);
$lastTime = time()-86400;
for ($i = 0; $i < $numComments; $i++) {
  $lastTime = $lastTime - random_int(1,5)*43200;
  $comments[] = new Comment(
    uniqid(),
    getContentID(),
    'Test User',
    '',
    fakeTitle(),
    fakeContent(),
    0,
    $lastTime
  );
}

?>

<div id="Comments">
  <h2>Comments (<?=$numComments?>)</h2>

  <div class="comment-list-wrapper">
    <ol class="comment-list">
      <?php foreach ($comments as $comment) : ?>
        <li class="comment-list-item">
          <header>
            <h3><?=$comment->Title?></h3>
            <time datetime="<?=date('Y-m-d\TH:i:s.000', $comment->Created)?>">
              <?=date('l jS \of F Y \a\t h:i A', $comment->Created)?>
            </time>
          </header>

          <section class="comment-body">
            <p><?=preg_replace('/\\\n\\\n/', '</p><p>', $comment->Content)?></p>
          </section>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</div>

<style>
  #Comments {
    padding: 0 1rem;
  }

  #Comments div.comment-list-wrapper ol.comment-list h3 {
    margin-bottom: 0.25rem;
    font-weight: 100;
  }

  #Comments div.comment-list-wrapper ol.comment-list time {
    font-size: 0.8rem;
    line-height: 1rem;
    color: #ffffff50;
  }

  #Comments div.comment-list-wrapper ol.comment-list p {
    color: #ffffff;
    text-shadow: var(--text-shadow-other);
  }
  
  #Comments div.comment-list-wrapper ol.comment-list {
    display: flex;
    flex: 1;
    flex-direction: column;
    align-items: stretch;
    justify-content: flex-start;
    list-style-type: none;
    padding: 0;
    margin: 0;
    color: rgba(255,255,255,0.8);
  }

  #Comments div.comment-list-wrapper ol.comment-list li.comment-list-item {
    margin-bottom: 2rem;
  }

  #Comments div.comment-list-wrapper ol.comment-list li.comment-list-item header {
    border-bottom: 1px solid #ffffff50;
    backdrop-filter: brightness(0.6) blur(10px);
    display: flex;
    flex-direction: column;
    padding: 0 1rem 1rem;
  }

  #Comments div.comment-list-wrapper ol.comment-list li.comment-list-item section.comment-body {
    backdrop-filter: brightness(0.8);
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    padding-top: 1rem;
    font-size: 0.9rem;
  }

  #Comments div.comment-list-wrapper ol.comment-list li.comment-list-item section.comment-body p {
    margin-left: 1rem;
    margin-right: 1rem;
    margin-bottom: 1rem;
    margin-top: 0;
  }
</style>

<?php

function fakeTitle(
  // no args
): string {
  $e = ['Now that is a', 'This really is a', 'wow! that\'s a', 'whoa', 'what a', 'such a', 'The most', 'Hah..'];
  $a = [' great', ' fantastic', ' brilliant', ' amazing', ' perfect', ' nice', ' wonderful', ' terrific'];
  $b = [' video', ' share', ' view', ' shot', ' background'];
  $c = [', thanks', ', cheers'];
  $d = ['!', '.', '...', '!!'];

  $title = preg_replace('/ a a/', ' an a', sprintf(
    '%s%s%s%s%s',
    $e[random_int(0, count($e)-1)],
    $a[random_int(0, count($a)-1)],
    $b[random_int(0, count($b)-1)],
    $c[random_int(0, count($c)-1)],
    $d[random_int(0, count($d)-1)]
  ));

  $title = sprintf(
    '%s%s',
    strtoupper(substr($title, 0, 1)),
    substr($title, 1)
  );

  return $title;
}

function fakeContent(
  // no args
): string {
  $fakeTitleCount = random_int(3, 10);
  $content = '';

  for ($i = 0; $i < $fakeTitleCount; $i++) {
    $newParagraph = $i % random_int(1, 5) === 1;
    $content .= fakeTitle() . ' ';
    if ($newParagraph) {
      $content = trim($content) . '\n\n';
    }
  }

  return preg_replace('/\s,/', ',', trim($content));
}
