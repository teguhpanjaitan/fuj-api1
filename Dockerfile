FROM php:7-fpm-alpine AS api_phpfpm
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /application
RUN set -eux; \
	docker-php-ext-install pdo pdo_mysql
# RUN set -eux; \
# 	composer install --prefer-dist --no-dev --no-scripts --no-progress --no-suggest; \
# 	composer clear-cache;
# CMD composer install --prefer-dist --no-dev --no-scripts --no-progress --no-suggest; \
# 	composer clear-cache

COPY docker/php-fpm/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]

FROM nginx:stable-alpine as api_nginx
WORKDIR /application
EXPOSE 80