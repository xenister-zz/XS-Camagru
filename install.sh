#!/usr/bin/env bash
docker exec $1 mysql -uroot -e "CREATE USER 'admin'@'localhost' IDENTIFIED BY 'secret'"
docker exec $1 mysql -uroot -e "GRANT ALL PRIVILEGES ON * . * TO 'admin'@'localhost';"
docker exec $1 mysql -uroot -e "create database camagru;"
docker exec $1 "mysql -uroot -e < /config/bdd.sql"
