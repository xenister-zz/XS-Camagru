docker exec test-cama_web_1 mysql -uroot -e "CREATE USER 'admin'@'localhost' IDENTIFIED BY 'secret'"
docker exec test-cama_web_1 mysql -uroot -e "GRANT ALL PRIVILEGES ON * . * TO 'admin'@'localhost';"
docker exec test-cama_web_1 mysql -uroot -e "create database camagru;"
