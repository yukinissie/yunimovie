FROM php:7.2-apache

RUN apt update \
  && apt install -y vim git zip unzip libpq-dev ffmpeg
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring
WORKDIR /var/www/html

EXPOSE 80