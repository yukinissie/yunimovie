<?php
require_once('movie.php');
require_once('jsonManager.php');
require_once('databaseManager.php');

class DataManager
{
  private static function crateMovieInstance() {
    $movies_data = DatabaseManager::loadMoviesData();
    for($i=0; $i<count($movies_data); $i++) {
      $movies[] = new Movie(
        $movies_data[$i]['id'], 
        $movies_data[$i]['title'], 
        $movies_data[$i]['url_movie'], 
        $movies_data[$i]['url_thumbnail'], 
        $movies_data[$i]['explanation'], 
        $movies_data[$i]['upLoadDate'], 
        $movies_data[$i]['viewCount']
      );
    }
    return $movies;
  }

  public static function getMovies() {
    return self::crateMovieInstance();
  }
  public static function getMoviesReversed() {
    return array_reverse(self::crateMovieInstance());
  }
}

