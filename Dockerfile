FROM php:apache

RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite

ADD ./src /var/www/html
