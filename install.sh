docker exec kamagru_web_1 mysql -uroot -e "CREATE USER 'xen'@'localhost' IDENTIFIED BY 'secret'"
docker exec kamagru_web_1 mysql -uroot -e "GRANT ALL PRIVILEGES ON * . * TO 'xen'@'localhost';"
