FROM php:7.4-fpm AS base

# PHP SQL DRIVER 
RUN docker-php-ext-install mysqli pdo pdo_mysql mcrypt mbstring && docker-php-ext-enable pdo_mysql

WORKDIR /app

FROM base AS dev

COPY --from=composer /usr/bin/composer /usr/bin/composer

###

FROM dev AS build

COPY composer.json composer.json

RUN composer install

COPY . /app

###

FROM base AS production

COPY --from=build /app /var/www/html
