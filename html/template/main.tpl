<div class="contents">
  <div class="container">
    <?php if(MovieManager::loadData() !== null): ?>
      <?php foreach($T->movies as $movie): ?>
        <div class="content">
          <form method="post" enctype="multipart/form-data">
            <div class="container">
              <h1 class="title">
                <?= DataManager::hsc($movie->getTitle()); ?>
              </h1>
            </div>
            <video playsinline preload="none" poster="<?= $movie->getThumbnail(); ?>" controls name="<?= $movie->getId(); ?>">
              <source src="<?= $movie->getUrl(); ?>">
              <p>動画を再生するには、videoタグをサポートしたブラウザが必要です。</p>
            </video>
            <div class="container">
            <div class="user">
              投稿者：<?= DataManager::hsc(UserManager::getUserName($movie->getUserId())); ?>
            </div>
            <div class="viewCount">
              再生回数：<?= DataManager::hsc($movie->getViewCount()); ?>
            </div>
            <div class="upLoadDate">
              投稿日：<?= DataManager::hsc($movie->getUpLoadDate()); ?>
            </div>
            <hr>
            <p class="explanation">
              <?= DataManager::hsc($movie->getExplanation()); ?>
            </p>
            <div class="border"></div>
            <?php if ($T->session_status === 'login' && $T->user->getId() === $movie->getUserId()): ?>
              <div class="btn btn-danger delete" id="<?= $movie->getId(); ?>">削除</div>
            <?php endif ?>
            <?php // echo var_dump($T->user->getId(), $movie->getUserId()); ?>
            </div>
          </form>
          <div class="empty"></div>
        </div>
      <?php endforeach ?>
      <?php else: ?>
        <div class="first-message">
          <div class="container">
            <h1><?= DataManager::hsc($T->user->getName()) . "さん、<br>こんにちは！" . '<br>'; ?></h1>
            <?php if ($T->user->getName() === 'ゲスト'): ?>
              <p>まずは<a href="signUp.php">サインアップ</a>しよう！</p>
            <?php else: ?>
              <p>動画を投稿してみよう↓</p>
            <? endif ?>
          </div>
        </div>
      <? endif ?>
    </div>
  </div>