<?php
class JsonManager
{
  private static $tmp_movies;

  public static function loadMovies() {
    $url = self::getUrl();
    $tmp_json = file_get_contents($url);
    $json = mb_convert_encoding($tmp_json, 'UTF8', 'ASCII, JIS, UTF-8, EUC-JP, SJIS-WIN');
    self::$tmp_movies = json_decode($json, true);
    if (self::$tmp_movies == NULL) {
      return null;
    } else {
      return self::$tmp_movies;
    }
  }
  private static function getUrl() {
    return "http://localhost/testData.json";
  }
}
?>