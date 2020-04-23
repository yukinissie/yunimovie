<?php
require_once('dataManager.php');
require_once('databaseManager.php');

class DeleteMovie
{
  private $id;
  private $dbh;

  public function __construct($id) {
    $this->id = DataManager::hsc($id);
    $this->delete();
  }

  private function delete() {
    if(DataManager::checkAjaxRequestIntegrity() == FALSE) {
      die('This access is not valid.');
    }
    $this->dbh = DatabaseManager::getHandle();
    DatabaseManager::checkConectDB($this->dbh);
    self::onFileSystem();
    self::onDatabase();
    $this->dbh = null;
  }
  private function onFileSystem() {
    $sql = 'select * from movie where id = :delete_id';
    $stmt = $this->dbh->prepare($sql);
    $flag = $stmt->execute(array(':delete_id' => $this->id));
    if($flag === FALSE) {
      die("削除：データベース読込失敗<br>\n");
    }
    $movies_data[] = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($movies_data[0] == null) {
      die("削除：読込失敗<br>\n");
    }
    unlink("{$movies_data[0]['url_movie']}");
    unlink("{$movies_data[0]['url_thumbnail']}");
    echo "削除：ファイルシステムからの削除成功<br>\n";
  }
  private function onDatabase() {
    $sql = 'delete from movie where id = :delete_id';
    $stmt = $this->dbh->prepare($sql);
    $flag = $stmt->execute(array(':delete_id' => $this->id));
    if($flag === FALSE) {
      die("削除：データベースからの削除失敗<br>\n");
    }
    echo "削除：データベースからの削除成功<br>\n";
  }
}



//このページでechoしたものがhtmlに返されて出力される
header("Content-type: text/plain; charset=UTF-8");

new DeleteMovie($_POST['id']);

