FROM php:8.1-fpm

RUN apt update \
    && apt install -y zlib1g-dev g++ git alien libicu-dev zip libzip-dev zip libaio1 wget \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

#COPY php.ini /usr/local/etc/php/conf.d/php-dev.ini

WORKDIR /var/www/app