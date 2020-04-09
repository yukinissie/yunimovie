CREATE DATABASE yunimovie;
use yunimovie;

CREATE TABLE movie (
  id INT(11) AUTO_INCREMENT NOT NULL,
  title VARCHAR(64) NOT NULL CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  url_movie VARCHAR(64) NOT NULL CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
	url_thumbnail VARCHAR(64) NOT NULL CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
	explanation VARCHAR(255) NOT NULL CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
	upLoadDate DATETIME(6) NOT NULL,
  viewCount INT(11) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO movie VALUES (null,'MyPortfolio', '../movie/admin/MyProject.mp4', 'img/admin/mq2.jpg', 'これは、テストの説明文です。これは、テストの説明文です。これは、テストの説明文です。これは、テストの説明文です。', '2020-04-01 08:12:20', 2);
INSERT INTO movie VALUES (null,'MyPortfolio', '../movie/admin/MyProject.mp4', 'img/admin/mq2.jpg', 'これは、テストの説明文です。これは、テストの説明文です。これは、テストの説明文です。これは、テストの説明文です。', '2020-04-02 12:20:01', 4);
INSERT INTO movie VALUES (null,'MyPortfolio', '../movie/admin/MyProject.mp4', 'img/admin/mq2.jpg', 'これは、テストの説明文です。これは、テストの説明文です。これは、テストの説明文です。これは、テストの説明文です。', '2020-04-03 22:10:13', 8);