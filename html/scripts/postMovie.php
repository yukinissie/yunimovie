<?php
require_once('dataManager.php');
require_once('movieManager.php');
require_once('thumbnailManager.php');
require_once('databaseManager.php');
require_once('CSRFMeasures.php');
require_once('user.php');

class PostMovie
{
  private $url_movie;
  private $url_thumbnail;
  private $title;
  private $explanatuon;
  private $user;

  public function __construct($title, $explanatuon, $tmp_movie_name, $tmp_thumbnail_name, $movie_type, $thumbnail_type,  $user) {
    $this->title = DataManager::hsc($title);
    $this->explanatuon = DataManager::hsc($explanatuon);
    $this->user = $user;
    $date = date("YmdHis");
    $movieManager = new MovieManager($tmp_movie_name, $movie_type, $date, $this->user);
    $thumbnailManager = new ThumbnailManager($tmp_thumbnail_name, $thumbnail_type, $date, $this->user);
    // 保存用の名前に変換
    $movieManager->generateNameMovie();
    $thumbnailManager->generateNameThumbnail();
    // 変換済みのデータをファイルシステム上に保存
    $movieManager->saveOnServerMovie();
    $thumbnailManager->saveOnServerThumbnail();
    // 保存したファイルのパスを作成
    $this->url_movie = $movieManager->generateFilePathMovie();
    $this->url_thumbnail = $thumbnailManager->generateFilePathThumbnail();
    // 各種データをデータベース上に挿入
    $this->post();
  }
  private function post() {
    if(DataManager::checkAjaxRequestIntegrity() === FALSE) {
      print "This access is not valid.<br>\n";
      return false;
    }
    $dbh = DatabaseManager::getHandle();
    DatabaseManager::checkConectDB($dbh);
    $sql = 'insert into movie (id, title, url_movie, url_thumbnail, explanation, upLoadDate, viewCount, user_id) values (?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $dbh->prepare($sql);
    $flag = $stmt->execute(array(null, $this->title, $this->url_movie, $this->url_thumbnail, $this->explanatuon, date("Y/m/d H:i:s"), 0, $this->user->getId()));
    if($flag === FALSE) {
      die("Post：データベースへの保存失敗<br>\n");
    } 
    $dbh = null;
    print_r("Post：データベースへの保存成功<br>\n");
  }
}

//このページでechoまたはprintしたものがhtmlに返されて出力される
header("Content-type: text/plain; charset=UTF-8");
if (CSRF::checkToken($_POST['csrf_token']) === FALSE) {
  die();
}

new PostMovie(
  $_POST['title'], 
  $_POST['explanation'],
  $_FILES['movie']['tmp_name'], 
  $_FILES['thumbnail']['tmp_name'], 
  $_FILES['movie']['type'], 
  $_FILES['thumbnail']['type'],
  $user
);
