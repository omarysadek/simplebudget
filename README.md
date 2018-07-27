# Simple Budget - Documentation

## Summary

- [*About*](#about)
- [*QuickSheets*](#quicksheets)
- [*Instruction*](#instruction)
- [*Parameters*](#parameters)
- [*Dev-ops*](#dev-ops)

## About

Simple Budget.
A simple way to handle budget for daily life purpose.
Documentation coming soon...

## QuickSheets

- Containers managment

```
sudo docker stop $(sudo docker ps -a -q) ;sudo docker rm $(sudo docker ps -a -q);
sudo docker-compose build --no-cache;
sudo docker-compose up;
```

## Instruction

If running from docker

```
sudo docker-compose up;
```

If running on a new environment

- Setup app configuration

```
cp app/config/parameters.yml.dist app/config/parameters.yml
```

- Generate the SSH keys

```
openssl genrsa -out app/config/jwt/private.pem -aes256 4096
openssl rsa -pubout -in app/config/jwt/private.pem -out app/config/jwt/public.pem
```

In case first openssl command forces you to input password use following to get the private key decrypted

```
openssl rsa -in app/config/jwt/private.pem -out app/config/jwt/private.pem
```

- Init the database and load data

```
php bin/console doctrine:database:create -n
php bin/console doctrine:schema:create -n
php bin/console doctrine:fixtures:load -n
```

## Parameters

#### Ports

| Application     | Port | Internal Port | URL                               |
|-----------------|------|---------------|-----------------------------------|
| api             | 1008 | 80            | http://127.0.0.1:1008/app_dev.php |
| postgres        | 2008 | 5432          |                                   |
| redis           | 3008 | 6379          |                                   |
| adminer         | 4008 | 8080          | http://127.0.0.1:4008/            |
| redis-commander | 5008 | 8081          | http://127.0.0.1:5008/            |

#### Database

| Field       | Value        |
|-------------|--------------|
| System      | PostgreSQL   |
| Server/IP   | postgres     |
| Username    | dev          |
| Password    | dev          |
| Database    | simplebudget |

## Dev-ops

Build and push an image (api)

```
sudo docker login -u omarsadek
cd docker/api
sudo docker build -t api .
sudo docker tag api omarsadek/simplebudget_api
sudo docker push omarsadek/simplebudget_api
```