<?php
require_once('dbConfig.php');

class DatabaseManager
{
  private static $dsn = DSN;
  private static $user = DB_USER;
  private static $password = DB_PASS;

  public function getHandle() {
    try {
      return new PDO(self::$dsn, self::$user, self::$password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch(PDOException $e) {
      print('Connection failed:'.$e->getMessage());
      die();
    }
  }
  /* デバッグ用 */
  public function checkConectDB($dbh) {
    if ($dbh == null){
      print("接続に失敗しました。<br>\n");
    }
    print("接続に成功しました。<br>\n");
  }
}