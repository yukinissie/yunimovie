<?php
require_once('scripts/databaseManager.php');

class SignIn
{
  private $errorMessage;
  private $userId;
  private $password;
  private $userData;

  public function __construct() {
    $this->errorMessage = "";
  }

  public function signin($userId, $password) {
    $this->userId = $userId;
    $this->password = $password;
    if ($this->isSetUserId() === FALSE) {
      $this->errorMessage = 'ユーザーIDが未入力です。';
      return false;
    }
    if ($this->isSetPassword() === FALSE) {
      $this->errorMessage = 'パスワードが未入力です。';
      return false;
    }
    if (($this->userData = $this->getUserData()) === FALSE) {
      $this->errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
      return false;
    }
    if ($this->checkUserId() === FALSE) {
      $this->errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
      return false;
    }
    if ($this->checkPassword() === FALSE) {
      $this->errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
      return false;
    }
    session_start();
    session_regenerate_id(true);
    $_SESSION["userName"] = $this->userData['name'];
    $_SESSION["ID"] = $this->userData['id'];
    header("Location: index.php");
  }
  private function getUserData() {
    try {
      $dbh = DatabaseManager::getHandle();
      $stmt = $dbh->prepare('SELECT * FROM userData WHERE name = ?');
      $stmt->execute(array($this->userId));
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return false;
    }
  }
  private function isSetUserId() {
    if (empty($this->userId)) {
      return false;
    } 
  }
  private function isSetPassword() {
    if (empty($this->password)) {
      return false;
    }
  }
  private function checkUserId() {
    if ($this->userData) {
      return true;
    } else {
      return false;
    }
  }
  private function checkPassword() {
    if (password_verify($this->password, $this->userData['password'])) {
      return true;
    } else {
      return false;
    }
  }
  public function getErrorMesage() {
    return $this->errorMessage;
  }
}


$signin = new SignIn();
if (isset($_POST['userid'])) {
  $signin->signin($_POST['userid'], $_POST['password']);
}

?>

<?php require_once('scripts/templateEngine.php'); ?>
<!doctype html>
<html>
  <head>
    <?php 
      $head_tpl = new TemplateEngine;
      $head_tpl->render('head.tpl');
    ?>
  </head>
  <body>
    <?php
      $header_tpl = new TemplateEngine; 
      $header_tpl->render('header.tpl');
    ?>
    <div class="container">
      <h1>Sign In</h1>
      <form id="loginForm" name="loginForm" action="" method="POST">
        <fieldset>
          <legend>Sign In Form</legend>
          <div><font color="#ff0000"><?php echo htmlspecialchars($signin->getErrorMesage(), ENT_QUOTES); ?></font></div>
          <label for="userid">User Name</label><input type="text" id="userid" name="userid" placeholder="ユーザーIDを入力" value="<?php if (!empty($_POST["userid"])) {echo htmlspecialchars($_POST["userid"], ENT_QUOTES);} ?>" class="form-control col-xs-12">
          <br>
          <label for="password">Password</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力" class="form-control col-xs-12">
          <br>
          <input type="submit" id="login" name="login" value="Sign In!" class="btn btn-primary float-right">
        </fieldset>
      </form>
      <br>
      <p>アカウントをお持ちではありませんか？</p>
      <a href="signUp.php">新規登録はこちら</a>
    </div>
    <?php 
      $bootstrap_javascript_tpl = new TemplateEngine;
      $bootstrap_javascript_tpl->render('bootstrapJavaScript.tpl');
    ?>
  </body>
</html>