<?php
require_once('movieManager.php');
header("Content-type: text/plain; charset=UTF-8");

echo $movieId = $_POST['movieId'];

echo MovieManager::countUp($movieId);