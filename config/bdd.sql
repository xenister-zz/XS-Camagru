
CREATE TABLE IF NOT EXISTS `user` (
  user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user_name VARCHAR(20),
  user_mail VARCHAR(50),
  user_password VARCHAR(64),
  user_timestamp TIMESTAMP,
  access_lvl INT NOT NULL,
  verif_token VARCHAR(64),
  mail_notif INT DEFAULT 1
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `notifications` (
  ntf_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  message text NOT NULL,
  user_id int(11) NOT NULL,
  target_type varchar(20) NOT NULL,
  target_id int(11) NOT NULL
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS image (
  img_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  file VARCHAR(20) NOT NULL,
  user_id INT NOT NULL,
  like_num INT,
  com_num INT,
  com_timestamp TIMESTAMP
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS `like` (
  img_id INT NOT NULL ,
  user_id INT NOT NULL,
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS comment (
  com_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  com_img_id INT NOT NULL,
  com_usr_id INT NOT NULL,
  com_content TEXT NOT NULL,
  com_timestamp TIMESTAMP
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;
