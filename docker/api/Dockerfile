FROM php:7.2-apache

RUN apt-get update
RUN apt-get install -y zip
RUN apt-get install -y unzip
RUN apt-get install -y libpq-dev
RUN apt-get install -y zlib1g-dev
RUN pecl install xdebug

RUN docker-php-ext-install pdo pdo_pgsql zip
RUN docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY parameters.yml /tmp/parameters.yml
COPY private.pem /tmp/private.pem
COPY public.pem /tmp/public.pem

RUN a2enmod rewrite