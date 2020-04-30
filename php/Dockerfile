FROM php:7.2-apache

RUN apt-get update
RUN apt-get install -y vim
RUN apt-get install -y git
RUN apt-get install -y zip unzip
RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring
RUN apt-get install -y ffmpeg
WORKDIR /var/www/html

EXPOSE 80