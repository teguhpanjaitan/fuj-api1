FROM php:7-fpm-alpine
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /application
# CMD bash -c "cd /application && composer install --prefer-dist --no-scripts --no-autoloader"
# CMD composer install --prefer-dist --no-scripts --no-autoloader
# RUN install.sh
CMD php-fpm ; /bin/sh install.sh