<?php
require_once('scripts/databaseManager.php');

class signUp
{
  private $errorMessage;
  private $signUpMessage;
  private $userName;
  private $password;
  private $password_secound;

  public function __construct() {
    $this->errorMessage = "";
    $this->signUpMessage = "";
  }

  public function signup($userName, $password, $password_secound) {
    $this->userName = $userName;
    $this->password = $password;
    $this->password_secound = $password_secound;
    if ($this->isSetUserName() === FALSE) {
      $this->errorMessage = 'ユーザーIDが未入力です。';
      return false;
    }
    if ($this->isSetPassword() === FALSE) {
      $this->errorMessage = 'パスワードが未入力です。';
      return false;
    }
    if ($this->isSetPasswordSecound() === FALSE) {
      $this->errorMessage = '確認用パスワードが未入力です。';
      return false;
    }
    if ($this->checkPassword() === FALSE) {
      $this->errorMessage = 'パスワードに誤りがあります。';
      return false;
    }
    session_start();
    try {
      $dbh = DatabaseManager::getHandle();
      $stmt = $dbh->prepare("INSERT INTO userData(name, password) VALUES (?, ?)");
      $stmt->execute(array($this->userName, password_hash($this->password, PASSWORD_DEFAULT)));
      $userid = $dbh->lastinsertid();
      mkdir(__DIR__ . "/movie/{$userid}", 0755, true);
      mkdir(__DIR__ . "/img/{$userid}", 0755, true);
      $this->signUpMessage = '登録が完了しました。';
      sleep (2);
      header("Location: signIn.php");
    } catch (PDOException $e) {
      $this->errorMessage = 'データベースエラー';
      // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
      // echo $e->getMessage();
    }
  }
  private function isSetUserName() {
    if (empty($this->userName)) {
      return false;
    } 
  }
  private function isSetPassword() {
    if (empty($this->password)) {
      return false;
    }
  }
  private function isSetPasswordSecound() {
    if (empty($this->password_secound)) {
      return false;
    }
  }
  private function checkPassword() {
    if ($this->password != $this->password_secound) {
      return false;
    }
  }
  public function getErrorMessage() {
    return $this->errorMessage;
  }
  public function getSignUpMessage() {
    return $this->signUpMessage;
  }
}

$signup = new SignUp;

// ログインボタンが押された場合
if (isset($_POST["signUp"])) {
  $signup->signup($_POST['username'], $_POST["password"], $_POST["password2"]);
}
?>

<?php require_once('scripts/templateEngine.php'); ?>
<?php require_once('scripts/dataManager.php'); ?>

<!doctype html>
<html>
  <head>
    <?php
      $head_tpl = new TemplateEngine();
      $head_tpl->render('head.tpl');
    ?>
  </head>
  <body>
    <?php
      $header_tpl = new TemplateEngine(); 
      $header_tpl->render('header.tpl');
    ?>
    <div class="container">
      <h1>Create New Account</h1>
      <form id="loginForm" name="loginForm" action="" method="POST">
        <fieldset>
          <legend>Sign Up Form</legend>
          <div><font color="#ff0000"><?= DataManager::hsc($signup->getErrorMessage()) ?></font></div>
          <div><font color="#0000ff"><?= DataManager::hsc($signup->getSignUpMessage()) ?></font></div>
          <label for="username">User Name</label><input type="text" id="username" name="username" placeholder="ユーザー名を入力" value="<?php if (!empty($_POST["username"])) { echo DataManager::hsc($_POST["username"]); } ?>" class="form-control col-xs-12">
          <br>
          <label for="password">Password</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力" class="form-control col-xs-12">
          <br>
          <label for="password2">Password (Re type!)</label><input type="password" id="password2" name="password2" value="" placeholder="再度パスワードを入力" class="form-control col-xs-12">
          <br>
          <input type="submit" id="signUp" name="signUp" value="Sign Up!" class="btn btn-primary float-right">
        </fieldset>
      </form>
      <br>
      <p>アカウントをお持ちですか？</p>
      <p><a href="signIn.php">サインインはこちら</a></p>
    </div>
    <?php 
      $bootstrap_javascript_tpl = new TemplateEngine;
      $bootstrap_javascript_tpl->render('bootstrapJavaScript.tpl');
    ?>
  </body>
</html>