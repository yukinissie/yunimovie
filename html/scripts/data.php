<?php
require_once('dataManager.php');

/* 動画データの取得 */ 
$movies = DataManager::getMoviesReversed(); // getMovies()で昇順を得られる
?>