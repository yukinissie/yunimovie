<div class="contents">
    <div class="container">
      <div class="content">
      <?php if(MovieManager::loadData() !== null): ?>
        <?php foreach($T->movies as $movie): ?>
          <form method="post" enctype="multipart/form-data">
            <h1>
              <?= $movie->getTitle(); ?>
            </h1>
            <video playsinline preload="none" poster="<?= $movie->getThumbnail(); ?>" controls>
              <source src="<?= $movie->getUrl(); ?>">
            </video>
            <div class="viewCount">
              再生回数：<?= $movie->getViewCount(); ?>
            </div>
            <div class="upLoadDate">
              投稿日：<?= $movie->getUpLoadDate(); ?>
            </div>
            <hr>
            <p class="explanation">
              <?= $movie->getExplanation(); ?>
            </p>
            <?php if ($T->session_status === 'login' && $T->user->getId() === $movie->getUserId()): ?>
            <div class="btn btn-danger delete" id="<?= $movie->getId(); ?>">削除</div>
            <?php endif ?>
            <div class="border"></div>
          </form>
        <?php endforeach ?>
        <?php else: ?>
          <div class="first-message">
            <div class="container">
              <?= $T->user->getName() . 'さん、こんにちは！' . '<br>'; ?>
              <?php if ($T->user->getName() === 'ゲスト'): ?>
                まずは<a href="signUp.php">サインアップ</a>しよう！
              <?php else: ?>
                動画を投稿してみよう↓
              <? endif ?>
            </div>
          </div>
        <? endif ?>
      </div>
    </div>
  </div>