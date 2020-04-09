<?php

$movie_name = $_GET['movie_name'];

$movie_dir = './upload/' . $movie_name;

$movieinfo = getimagesize($movie_dir);

header('Content-Type: ' . $movieinfo['mime']);
readfile($movie_dir);