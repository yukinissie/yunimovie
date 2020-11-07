<?php

ini_set('display_errors', 1);

define('DSN', 'mysql:host=localhost;dbname='.getenv('MYSQL_DATABASE').';charset=utf8mb4;');
define('DB_USER', getenv('MYSQL_USER'));
define('DB_PASS', getenv('MYSQL_PASSWORD'));
