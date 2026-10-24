# Wspólna baza dla DEV i PROD
FROM php:8.4-fpm-bookworm AS base

RUN docker-php-ext-install pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /app


# Środowisko deweloperskie
FROM base AS development

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug


# Środowisko produkcyjne

FROM base AS production
# OPcache
RUN docker-php-ext-install opcache

COPY docker/php/production.ini \
    /usr/local/etc/php/conf.d/99-production.ini

# Najpierw pliki zależności
COPY composer.json composer.lock ./

# Instalacja zależności
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --no-scripts \
    --no-autoloader

# Dopiero teraz kod aplikacji
COPY src/ ./src/
COPY public/ ./public/

# Generowanie zoptymalizowanego autoloadera
RUN composer dump-autoload \
    --no-dev \
    --optimize
