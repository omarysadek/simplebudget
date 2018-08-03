#!/bin/bash

mkdir -p /var/www/html/web/coverage

cp /tmp/parameters.yml /var/www/html/app/config
mkdir -p /var/www/html/app/config/jwt
cp /tmp/private.pem /var/www/html/app/config/jwt/private.pem
cp /tmp/public.pem /var/www/html/app/config/jwt/public.pem

composer install -d/var/www/html/

php /var/www/html/bin/console doctrine:schema:create -n
php /var/www/html/bin/console doctrine:fixtures:load -n
