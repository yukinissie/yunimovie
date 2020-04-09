<?php
require_once('databaseManager.php');
require_once('user.php');


class PostMovie extends DatabaseManager
{
  private $movie_name;
  private $thumbnail_name;
  private $tmp_movie_name;
  private $tmp_thumbnail_name;
  private $movie_type;
  private $thumbnail_type;
  private $title;
  private $url_movie;
  private $url_thumbnail;
  private $explanatuon;
  private $user;
  private $date;

  public function __construct($title, $explanatuon, $tmp_movie_name, $tmp_thumbnail_name, $movie_type, $thumbnail_type, $user) {
    $this->title = $title;
    $this->explanatuon = $explanatuon;
    $this->tmp_movie_name = $tmp_movie_name;
    $this->tmp_thumbnail_name = $tmp_thumbnail_name;
    $this->movie_type = $movie_type;
    $this->thumbnail_type = $thumbnail_type;
    $this->user = $user;
    $this->date = date("YmdHis");

    // 保存用の名前に変換
    $this->setMovieName();
    $this->setThumbnailName();
    // 変換済みのデータをファイルシステム上に保存
    $this->upLoadMovie();
    $this->upLoadThumbnail();
    // 保存したファイルのパスを作成
    $this->setUrlMovie();
    $this->setUrlThumbnail();
    // 各種データをデータベース上に挿入
    $this->post();
  }
  private function setMovieName() {
    $this->movie_name = $this->date.'.mp4';
  }
  private function setThumbnailName() {
    $this->thumbnail_name = $this->date.'.'.$this->getType();
  }
  private function getType() {
    switch($this->thumbnail_type) {
      case 'image/gif' : return 'gif'; break;
      case 'image/jpeg' : return 'jpeg'; break;
      case 'image/png' : return 'png'; break;
    }
  }
  private function upLoadMovie() {
    if($this->movie_type === 'video/mp4') {
      $result = move_uploaded_file($this->tmp_movie_name, '../movie/'.$this->user->getName().'/'.$this->movie_name);
      echo $this->upLoadResult($result, 'MP4 MOVIE');
    } else {
      $result = $this->toMP4();
      echo $this->upLoadResult($result, 'MOVIE');
    }
  }
  private function upLoadThumbnail() {
    $result = move_uploaded_file($this->tmp_thumbnail_name, '../img/'.$this->user->getName().'/'.$this->thumbnail_name);
    echo $this->upLoadResult($result, 'IMAGE');
  }
  private function upLoadResult($result, $type) {
    if ($result === false) {
      return 'UPLOAD '.$type.'FAILE<br>\n';
    }
    // return 'UPLOAD OK<br>\n';
  }
  private function toMP4() {
    // print 'converting<br>\n';
    $result = shell_exec('ffmpeg -i '.$this->tmp_movie_name.' -pix_fmt yuv420p ../movie/'.$this->user->getName().'/'.$this->date.'.mp4');
    print 'converted<br>\n';
    return $this->convertedResult($result);
  }
  private function convertedResult($result) {
    if($result !== null) {
      print 'CONVERT FALSE<br>\n';
      return false;
    }
    // print 'CONVERT OK<br>\n';
    return true;
  }
  private function setUrlMovie() {
    $this->url_movie = '../movie/'.$this->user->getName().'/'.$this->movie_name;
  }
  private function setUrlThumbnail() {
    $this->url_thumbnail = '../img/'.$this->user->getName().'/'.$this->thumbnail_name;
  }
  private function post() {
    //Ajaxによるリクエストかどうかの識別を先に行う
    if(self::checkAjaxRequestIntegrity() === FALSE) {
      print 'This access is not valid.<br>\n';
      return false;
    }
    $dbh = self::conectDB();
    // self::checkConectDB($dbh);
    $sql = 'insert into movie (id, title, url_movie, url_thumbnail, explanation, upLoadDate, viewCount) values (?, ?, ?, ?, ?, ?, ?)';
    $stmt = $dbh->prepare($sql);
    $flag = $stmt->execute(array(null, $this->title, $this->url_movie, $this->url_thumbnail, $this->explanatuon, date("Y/m/d H:i:s"), 0));
    if($flag === TRUE) {
      $dbh = null;
      print 'データの追加に成功しました<br>\n';
    } else {
      print 'データの追加に失敗しました<br>\n';
      die();
    }
  }
}


//このページでechoまたはprintしたものがhtmlに返されて出力される
header("Content-type: text/plain; charset=UTF-8");
$user = new User('admin');

new PostMovie(
  $_POST['title'], 
  $_POST['explanation'],
  $_FILES['movie']['tmp_name'], 
  $_FILES['thumbnail']['tmp_name'], 
  $_FILES['movie']['type'], 
  $_FILES['thumbnail']['type'],
  $user
);
