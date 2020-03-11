FROM php:7-fpm-alpine
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /application
CMD php-fpm ; composer install ; tail -f /dev/null