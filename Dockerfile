FROM php:7.2.11-fpm-stretch

RUN docker-php-ext-install pdo_mysql

COPY . /app
WORKDIR /app
