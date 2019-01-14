CREATE TABLE IF NOT EXISTS `user` (
  user_id INT NOT NULL PRIMARY KEY,
  user_name VARCHAR(255),
  user_mail VARCHAR(255),
  user_password VARCHAR(255),
  user_timestamp TIMESTAMP,
  access_lvl INT NOT NULL,
  user_bio VARCHAR(256)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS image (
  img_id INT NOT NULL PRIMARY KEY,
  file VARCHAR(20) NOT NULL,
  user_id INT NOT NULL,
  like_num INT,
  com_num INT,
  com_timestamp TIMESTAMP
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS comment (
  com_id INT NOT NULL PRIMARY KEY,
  com_img_id INT NOT NULL,
  com_usr_id INT NOT NULL,
  com_content VARCHAR (500),
  com_timestamp TIMESTAMP
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;
