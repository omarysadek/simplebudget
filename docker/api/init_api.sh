#!/bin/bash

cp /tmp/parameters.yml /var/www/html/app/config
cp /tmp/private.pem /var/www/html/app/config/jwt
cp /tmp/public.pem /var/www/html/app/config/jwt

composer install -d/var/www/html/

php /var/www/html/bin/console doctrine:schema:create -n
php /var/www/html/bin/console doctrine:fixtures:load -n
