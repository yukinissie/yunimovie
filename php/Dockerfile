FROM php:8.3-apache

RUN apt update \
  && apt install -y vim git zip unzip libpq-dev ffmpeg
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring
WORKDIR /var/www/html

EXPOSE 80