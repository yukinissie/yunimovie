<?php
require_once('databaseManager.php');

class PostMovie extends DBManager
{
  public function post($title, $url, $thumbnail, $explanatuon) {
    $dbh = self::conectDB();
    self::checkConectDB($dbh);
    //Ajaxによるリクエストかどうかの識別を先に行う
    if(self::checkAjaxRequestIntegrity() == FALSE) {
      die();
      return 'This access is not valid.';
    }
    if(!(isset($_POST['url']))) {
      die();
      return 'The parameter of "url" is not found.';
    }
    $sql = 'insert into movie (id, title, url, thumbnail, explanation, upLoadDate, viewCount) values (?, ?, ?, ?, ?, ?, ?)';
    $stmt = $dbh->prepare($sql);
    $flag = $stmt->execute(array(null, $title, $url, $thumbnail, $explanatuon, date("Y/m/d H:i:s"), 0));
    if($flag) {
      $dbh = null;
      return 'データの追加に成功しました<br>';
    } else {
      die();
      return 'データの追加に失敗しました<br>';
    }
  }
}



//このページでechoしたものがhtmlに返されて出力される
header("Content-type: text/plain; charset=UTF-8");

$post =  new PostMovie();

$title = $post->hsc($_POST['title']);
$url = $post->hsc($_POST['url']);
$thumbnail = $post->hsc($_POST['thumbnail']);
$explanatuon = $post->hsc($_POST['explanation']);

echo $post->post($title, $url, $thumbnail, $explanatuon);