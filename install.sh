docker exec camagru_web_1 mysql -uroot -e "CREATE USER 'abbenham'@'localhost' IDENTIFIED BY 'secret'"
docker exec camagru_web_1 mysql -uroot -e "GRANT ALL PRIVILEGES ON * . * TO 'abbenham'@'localhost';"
docker exec camagru_web_1 mysql -uroot -e "create database camagru_abbenham;"
