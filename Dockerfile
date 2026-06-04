FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git curl unzip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-interaction --prefer-dist

CMD ["php-fpm"]