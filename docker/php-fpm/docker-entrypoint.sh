#!/bin/sh
set -e

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

if [ "$1" = 'php-fpm' ] || [ "$1" = 'php' ] || [ "$1" = 'bin/console' ]; then
	mkdir -p var/cache var/log
	# setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX var
	# setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX var

	if [ "$APP_ENV" != 'prod' ]; then
		composer install --prefer-dist --no-progress --no-suggest --no-interaction
	fi

	echo "Waiting for db to be ready..."
	until bin/console doctrine:query:sql "SELECT 1" > /dev/null 2>&1; do
		# echo "Waiting db"
		sleep 3
	done

	if ls -A src/Migrations/*.php > /dev/null 2>&1; then
		bin/console doctrine:migrations:migrate --no-interaction
	fi

	#keygen part
	mkdir -p "config/jwt"
	rm -f config/jwt/private.pem
	rm -f config/jwt/public.pem
	openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pass pass:fuj-api1 -pkeyopt rsa_keygen_bits:4096
	openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout -passin pass:fuj-api1

	chmod +rwX config/jwt/private.pem
	chmod +rwX config/jwt/public.pem
fi

exec docker-php-entrypoint "$@"