<?php
class DBManager
{
  private static $dsn = 'mysql:host=localhost;dbname=yunimovie;charset=utf8mb4';
  private static $user = 'root';
  private static $password = 'root';

  public function loadMoviesData() {
    $dbh = self::conectDB();
    $sql = 'select * from movie;';
    $stmt = $dbh->query($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    for($i=0; $i<$count; $i++) {
      $tmp_movies[] = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    $dbh = null;
    return $tmp_movies;
  }

  protected function conectDB() {
    try {
      return new PDO(self::$dsn, self::$user, self::$password);
    } catch(PDOException $e) {
      print('Connection failed:'.$e->getMessage());
      die();
    }
  }

  public function hsc($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }

  public function checkAjaxRequestIntegrity() {
    //strtolower()を付けるのは、XMLHttpRequestやxmlHttpRequestで返ってくる場合があるため
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {  
      return false;
    } else {
      return true;
    }
  }

  /* デバッグ用 */
  protected function checkConectDB($dbh) {
    if ($dbh == null){
      print('接続に失敗しました。<br>');
    }else{
      print('接続に成功しました。<br>');
    }
  }
}