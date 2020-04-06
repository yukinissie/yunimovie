<?php
class JsonManager
{
  public static function loadMoviesData() {
    $url_json = self::getUrl();
    $tmp_json = file_get_contents($url_json);
    $json = mb_convert_encoding($tmp_json, 'UTF8', 'ASCII, JIS, UTF-8, EUC-JP, SJIS-WIN');
    $tmp_movies = json_decode($json, true);
    return $tmp_movies;
  }
  private static function getUrl() {
    return "http://localhost/testData.json";
  }
}