<?php
session_start();

if (isset($_SESSION["NAME"])) {
    $errorMessage = "ログアウトしました。";
} else {
    $errorMessage = "セッションがタイムアウトしました。";
}

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
@session_destroy();
?>

<!doctype html>
<html>
  <head>
  <?php 
    require_once('scripts/templateEngine.php');
    $head_tpl = new TemplateEngine();
    $head_tpl->render('head.tpl');
  ?>
  <?php
    $header_tpl = new TemplateEngine(); 
    $header_tpl->render('header.tpl');
  ?>
  </head>
  <body>
    <div class="container">
      <h1>ログアウト画面</h1>
      <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
      <ul>
        <li><a href="signIn.php">ログイン画面に戻る</a></li>
      </ul>
    </div>
  </body>
</html>