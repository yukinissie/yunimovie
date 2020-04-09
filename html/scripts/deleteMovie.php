<?php
require_once('databaseManager.php');

class DeleteMovie extends DatabaseManager
{
  public function delete($id) {
    $dbh = self::conectDB();
    self::checkConectDB($dbh);
    //Ajaxによるリクエストかどうかの識別を先に行う
    if(self::checkAjaxRequestIntegrity() == FALSE) {
      die();
      return 'This access is not valid.';
    }
    if(!(isset($_POST['id']))) {
      die();
      return 'The parameter of "id" is not found.';
    }
    $sql = 'delete from movie where id = :delete_id';
    $stmt = $dbh->prepare($sql);
    $flag = $stmt->execute(array(':delete_id' => $id));
    if($flag) {
      $dbh = null;
      return 'データの削除に成功しました<br>';
    } else {
      die();
      return 'データの削除に失敗しました<br>';
    }
  }
}



//このページでechoしたものがhtmlに返されて出力される
header("Content-type: text/plain; charset=UTF-8");

$delete =  new DeleteMovie();

$id = $delete->hsc($_POST['id']);
echo $id;
echo $delete->delete($id);