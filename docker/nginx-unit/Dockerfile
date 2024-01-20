FROM nginx/unit:1.29.1-php8.1 as base

#Ability to build secure ssh tunnel to production environment for debug purposes
RUN apt-get update && apt-get install -y openssh-client

#dev-ops tools
RUN apt-get update && apt-get install -y \
    mc htop wget

RUN apt-get update && apt-get install -y \
    python3 python3-numpy python3-scipy python3-pandas
RUN ln -s /usr/bin/python3 /usr/bin/python3.6

RUN apt-get update && apt-get install -y \
    libzip-dev libicu-dev libmcrypt-dev libpng-dev libjpeg-dev

RUN docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-install zip intl opcache pdo pdo_mysql gd bcmath
RUN pecl install redis-5.3.7 apcu \
	&& docker-php-ext-enable redis

WORKDIR /app

COPY docker/nginx-unit/config.json /docker-entrypoint.d/config.json
COPY docker/nginx-unit/docker-entrypoint.sh /docker-entrypoint.sh
COPY ./docker/php/conf.d/* /usr/local/etc/php/conf.d/
COPY . /app/
RUN set -eux; \
	mkdir -p var/cache var/log; \
    chmod 777 -R var/;

FROM base as dev

RUN pecl install xdebug \
	&& docker-php-ext-enable xdebug
