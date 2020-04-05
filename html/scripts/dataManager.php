<?php
require_once('movie.php');
require_once('jsonManager.php');
// require_once('databaseManager.php');

class DataManager
{
  private static $movies;

  private static function crateMovieInstance($tmp_movies) {
    for($i=0; $i<count($tmp_movies); $i++) {
      self::$movies[] = new Movie(
        $tmp_movies[$i]['id'], 
        $tmp_movies[$i]['title'], 
        $tmp_movies[$i]['url'], 
        $tmp_movies[$i]['thumbnail'], 
        $tmp_movies[$i]['explanation'], 
        $tmp_movies[$i]['upLoadDate'], 
        $tmp_movies[$i]['viewCount']
      );
    }
    return self::$movies;
  }
  private function loadMovies() {
    $tmp_movies = JsonManager::loadMovies();
    // $tmp_movies = DBManager::loadMovies();
    return self::crateMovieInstance($tmp_movies);
  }

  public static function getMovies() {
    return self::loadMovies();
  }
  public static function getMoviesReversed() {
    return array_reverse(self::loadMovies());
  }
}






?>