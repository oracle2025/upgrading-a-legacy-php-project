# upgrading-a-legacy-php-project
A Tutorial on how to migrate a php project to a newer version, supported by Continous Integration and tests

Open current directory in php 7 docker

    docker run -p 8080:8080 -it -v `pwd`:`pwd` --workdir `pwd` php:7 /bin/bash
    docker-php-ext-install mysqli

run php as local webserver

    php -S 0.0.0.0:8080

Start a mysql container and connect it to docker container

    docker run --name=mysql1 -p 3306:3306 -e MYSQL_ROOT_PASSWORD=123456 -e "MYSQL_ROOT_HOST=%" -e MYSQL_DATABASE=mydatabase -e MYSQL_USER=myuser -e MYSQL_PASSWORD=mypassword -d mysql/mysql-server:8.0

    -e MYSQL_DATABASE=mydatabase -e MYSQL_USER=myuser -e MYSQL_PASSWORD=mypassword

    docker network create my-net #creates a bridge network
    docker create --name my-sql --network my-net --publish 8080:80 mysql:latest # creates container that is available on my-net
    docker network connect my-net my-sql # connects running container to network

Connect to mysql docker and set permissions

    docker exec -it mysql1 bash
    mysql -u root -p
    CREATE USER 'root'@'%' IDENTIFIED BY '123456';
    GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
    flush privileges;
    create database `database`;