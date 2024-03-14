FROM php:8.3-fpm


RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        apt-utils \
        libpq-dev \
        libpng-dev \
        libzip-dev \
        zip \
        unzip \
        git \
    && rm -rf /var/lib/apt/lists/*


RUN docker-php-ext-install pdo_mysql bcmath gd zip sockets


COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini


ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
