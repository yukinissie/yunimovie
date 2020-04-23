<?php

class Logout
{
  private $message;

  public function logout($userName) {
    if (isset($userName)) {
      $this->message = "ログアウトしました。\n";
    } else {
      $this->message = "セッションがタイムアウトしました。\n";
    }
    // セッションの変数のクリア
    $_SESSION[] = array();
    // セッションクリア
    @session_destroy();
  }
  public function getMessage() {
    return $this->message;
  }
}

session_start();
$logout = new Logout($_SESSION["userName"]);

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
      <h1>Logout...</h1>
      <p><?= $logout->getMessage(); ?></p>
      <a href="signIn.php">サインイン画面へ</a>
    </div>
    <?php 
      $bootstrap_javascript_tpl = new TemplateEngine;
      $bootstrap_javascript_tpl->render('bootstrapJavaScript.tpl');
    ?>
  </body>
</html>