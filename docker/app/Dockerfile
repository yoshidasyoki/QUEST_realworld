FROM php:8.5-fpm

ARG UID=1000
ARG GID=1000

RUN groupadd -g ${GID} app \
    && useradd -u ${UID} -g app -m app

WORKDIR /var/www/html

RUN apt-get update
RUN apt-get install -y \
    zip unzip curl \
    && docker-php-ext-install pdo pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ./docker/app/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN curl -fsSL https://deb.nodesource.com/setup_24.x | bash - \
    && apt-get install -y nodejs

USER app
