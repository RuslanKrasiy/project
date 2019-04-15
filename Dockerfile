FROM php:apache

RUN docker-php-ext-install pdo pdo_mysql

ADD ./src /var/www/html
