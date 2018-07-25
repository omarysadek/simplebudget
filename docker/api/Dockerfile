FROM php:7.2-apache

RUN apt-get update

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite