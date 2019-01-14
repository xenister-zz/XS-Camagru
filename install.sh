docker exec camagru_web_1 mysql -uroot -e "CREATE USER 'admin'@'localhost' IDENTIFIED BY 'secret'"
docker exec camagru_web_1 mysql -uroot -e "GRANT ALL PRIVILEGES ON * . * TO 'admin'@'localhost';"
docker exec camagru_web_1 mysql -uroot -e "create database camagru;"
mkdir img