CREATE DATABASE yunimovie;
use yunimovie;
CREATE TABLE movie (
  id INT(11) AUTO_INCREMENT NOT NULL,
  title VARCHAR(64) NOT NULL COLLATE utf8mb4_general_ci,
  url_movie VARCHAR(64) NOT NULL  COLLATE utf8mb4_general_ci,
	url_thumbnail VARCHAR(64) NOT NULL  COLLATE utf8mb4_general_ci,
	explanation VARCHAR(255) NOT NULL  COLLATE utf8mb4_general_ci,
	upLoadDate DATETIME(6) NOT NULL,
  viewCount INT(11) NOT NULL,
  user_id INT(11) NOT NULL,
  PRIMARY KEY (id)
);
CREATE TABLE user (
  id INT(11) AUTO_INCREMENT NOT NULL,
  name VARCHAR(64) NOT NULL  COLLATE utf8mb4_general_ci,
  password VARCHAR(64) NOT NULL  COLLATE utf8mb4_general_ci,
  PRIMARY KEY (id)
);

