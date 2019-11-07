FROM php:7.3.7-fpm-alpine

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

RUN  docker-php-ext-configure gd \
    --with-gd \
    --with-freetype-dir=/usr/include/ \
    --with-png-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ && \
  NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
  docker-php-ext-install -j${NPROC} gd && \
  apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

RUN docker-php-ext-install intl opcache zip pcntl sockets

RUN pecl install pcov && \
    echo 'extension=pcov.so' > /usr/local/etc/php/conf.d/docker-php-ext-pcov.ini

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
