<?php
require_once('scripts/data.php');
?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>YuniMovie</title>
		<link rel="stylesheet" href="./styles/style.css">
  </head>
  <body>
	<header>
		<div class="container">
			<div class="site-logo">
				YuniMovie.
			</div>
		</div>
  </header>
  <div class="contents">
    <div class="container">
      <div class="content">
        <?php foreach($movies as $movie): ?>
          <h1>
            <?php echo $movie->getId().":".$movie->getTitle(); ?>
          </h1>
          <video playsinline preload="none" poster="<?php echo $movie->getThumbnail(); ?>" controls>
            <source src="<?php echo $movie->getUrl(); ?>">
          </video>
          <div class="viewCount">
            視聴回数：<?php echo $movie->getViewCount(); ?>
          </div>
          <div class="upLoadDate">
            投稿日：<?php echo $movie->getUpLoadDate(); ?>
          </div>
          <hr>
          <p class="explanation">
            <?php echo $movie->getExplanation(); ?>
          </p>
          <div class="border"></div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>