<?php
require_once('dataManager.php');
require_once('databaseManager.php');

class MovieManager
{
  private $movie_name;
  private $tmp_movie_name;
  private $movie_type;
  private $date;
  private $user;

  public function __construct($tmp_movie_name, $movie_type, $date, $user) {
    $this->tmp_movie_name = DataManager::hsc($tmp_movie_name);
    $this->movie_type = DataManager::hsc($movie_type);
    $this->date = $date;
    $this->user = $user;
  }

  private function crateInstance() {
    $movies_data = self::loadData();
    for($i=0; $i<count($movies_data); $i++) {
      $movies_instance[] = new Movie(
        $movies_data[$i]['id'], 
        $movies_data[$i]['title'], 
        $movies_data[$i]['url_movie'], 
        $movies_data[$i]['url_thumbnail'], 
        $movies_data[$i]['explanation'], 
        $movies_data[$i]['upLoadDate'], 
        $movies_data[$i]['viewCount'],
        $movies_data[$i]['user_id']
      );
    }
    return $movies_instance;
  }
  public function loadData() {
    $dbh = DatabaseManager::getHandle();
    $sql = 'select * from movie;';
    $stmt = $dbh->query($sql);
    $stmt->execute();
    $count = $stmt->rowCount();
    for($i=0; $i<$count; $i++) {
      $movies_data[] = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    $dbh = null;
    return $movies_data;
  }
  public static function getList() {
    return self::crateInstance();
  }
  public static function getReversedList() {
    return array_reverse(self::crateInstance());
  }
  public function generateNameMovie() {
    $this->movie_name = $this->date . '.mp4';
  }
  public function saveOnServerMovie() {
    if($this->movie_type === 'video/mp4') {
      $result = move_uploaded_file($this->tmp_movie_name, '../movie/' . $this->user->getId() . '/' . $this->movie_name);
      echo DataManager::upLoadResult($result, 'MP4 MOVIE');
    } else {
      $result = $this->toMP4();
      echo DataManager::upLoadResult($result, 'MOVIE');
    }
  }
  private function toMP4() {
    print "converting<br>\n";
    $result = shell_exec('ffmpeg -i ' . $this->tmp_movie_name . ' -pix_fmt yuv420p ../movie/' . $this->user->getId() . '/' . $this->date . '.mp4');
    print "converted<br>\n";
    return $this->convertedResult($result);
  }
  private function convertedResult($result) {
    if($result !== null) {
      print "CONVERT FALSE<br>\n";
      return false;
    }
    print "CONVERT OK<br>\n";
    return true;
  }
  public function generateFilePathMovie() {
    return '../movie/' . $this->user->getId() . '/' . $this->movie_name;
  }
}