<?php
require_once('movie.php');

class dataManager
{
  private function loadMovies() {
    $movie = array();
    $movie[1] = new Movie(1,'MyPortfolio', '../movie/MyProject.mp4', 'img/mq2.jpg', 'これは、テストの説明文です。これは、テストの説明文です。これは、テストの説明文です。これは、テストの説明文です。', '2020-04-01', 2);
    $movie[2] = new Movie(2,'MyPortfolio', '../movie/MyProject.mp4', 'img/mq2.jpg', 'これは、テストの説明文です。これは、テストの説明文です。これは、テストの説明文です。これは、テストの説明文です。', '2020-04-02', 4);
    $movie[3] = new Movie(3,'MyPortfolio', '../movie/MyProject.mp4', 'img/mq2.jpg', 'これは、テストの説明文です。これは、テストの説明文です。これは、テストの説明文です。これは、テストの説明文です。', '2020-04-03', 8);
    
    for($i=1; $i<=count($movie); $i++) {
      $movies[] = $movie[$i];
    }
    return $movies;
  }

  public static function getMovies() {
    return self::loadMovies();
  }
  public static function getMoviesReversed() {
    return array_reverse(self::loadMovies());
  }
}






?>