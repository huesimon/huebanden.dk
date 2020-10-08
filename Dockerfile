FROM php:7-fpm-alpine AS base

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
