FROM php:8.1-fpm

ARG USER_ID=1000
ARG GROUP_ID=1000

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

RUN groupadd -g ${GROUP_ID} appgroup \
    && useradd -u ${USER_ID} -g ${GROUP_ID} -m appuser

RUN pecl install xdebug && docker-php-ext-enable xdebug && \
  echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /var/www


COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

USER appuser
