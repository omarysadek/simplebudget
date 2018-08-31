# Simple Budget - Documentation

## Summary

- [*About*](#about)
- [*QuickSheets*](#quicksheets)
- [*Instruction*](#instruction)
- [*Unit test*](#unit-test)
- [*Parameters*](#parameters)
- [*Dev-ops*](#dev-ops)
- [*Todo List*](#todo-list)

## About

Simple Budget.

A simple way to handle your budget for daily life purpose.

It will split each month your income in different budget, starting by bills, then saving, then projects.... and what is left over, you can spent it whenever you wants without caring if you got enoupgh money to pay bills.

Documentation coming soon...

## QuickSheets

- Containers managment

```
sudo docker stop $(sudo docker ps -a -q) ;sudo docker rm $(sudo docker ps -a -q);
docker stop $(docker ps -a -q) ;docker rm $(docker ps -a -q);
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

## Unit test

```
./vendor/bin/simple-phpunit
```

#### Fixing PSR-2 Issue

```
./vendor/bin/php-cs-fixer fix src --rules=@Symfony
./vendor/bin/php-cs-fixer fix tests --rules=@Symfony
```

#### Code Coverage

[http://127.0.0.1:8100/coverage/index.html](http://127.0.0.1:8100/coverage/index.html)


## Parameters

#### Ports

| Application     | Port | Internal Port | URL                               |
|-----------------|------|---------------|-----------------------------------|
| api             | 8100 | 80            | http://127.0.0.1:8100/            |
| postgres        | 8200 | 5432          |                                   |
| redis           | 8300 | 6379          |                                   |
| adminer         | 8400 | 8080          | http://127.0.0.1:8400/            |
| redis-commander | 8500 | 8081          | http://127.0.0.1:8500/            |

#### Database

| Field       | Value        |
|-------------|--------------|
| System      | PostgreSQL   |
| Server/IP   | postgres     |
| Username    | dev          |
| Password    | dev          |
| Database    | simplebudget |

## Dev-ops

Build and push a Docker image (api)

```
sudo docker login
cd docker/api
sudo docker build -t api .
sudo docker tag api omarsadek/simplebudget_api
sudo docker push omarsadek/simplebudget_api
```

Build and push a Vagrant image

```
vagrant package --output simplebudget.box
```

Then upload it here : https://app.vagrantup.com/
## Todo Lis

- Configure nelmio/api-doc-bundle (swagger with post man)
- Configure stof/doctrine-extensions-bundle => Loggable
- Configure willdurand/faker-bundle

