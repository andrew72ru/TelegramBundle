FROM php:7.4.6-fpm-alpine3.11 as php

RUN set -xe && apk update && apk upgrade

RUN apk add --no-cache \
    shadow \
    libzip-dev \
    libintl \
    icu \
    icu-dev \
    curl \
    libmcrypt \
    libmcrypt-dev \
    libxml2-dev \
    freetype \
    freetype-dev \
    libpng \
    libpng-dev \
    libjpeg-turbo \
    libjpeg-turbo-dev \
    pcre-dev \
    make \
    g++ \
    autoconf

RUN docker-php-ext-install intl opcache zip pcntl sockets

RUN pecl install pcov && \
    docker-php-ext-enable pcov

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_MEMORY_LIMIT=-1

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
