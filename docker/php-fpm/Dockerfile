FROM php:7-fpm-alpine
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /application
# CMD composer install --prefer-dist --no-dev --no-scripts --no-progress --no-suggest
RUN set -eux; \
	docker-php-ext-install pdo pdo_mysql
RUN set -eux; \
	composer install --prefer-dist --no-dev --no-scripts --no-progress --no-suggest; \
	composer clear-cache;
COPY docker/php-fpm/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint
ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]