<?php
class DBManager
{
  private static $dsn = 'mysql:host=localhost;dbname=yunimovie;charset=utf8';
  private static $user = 'root';
  private static $password = 'root';

  public static function loadMovies() {

  }

  public function conectDB() {
    try{
        $dbh = new PDO(self::$dsn, self::$user, self::$password);
    }catch (PDOException $e){
        print('Connection failed:'.$e->getMessage());
        die();
    }
  }
}

DBManager::conectDB();
?>