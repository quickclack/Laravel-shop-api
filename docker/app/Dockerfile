FROM php:8.1-fpm

RUN apt-get update  && apt-get -y --no-install-recommends install \
    jq \
    git \
    curl \
    rsync \
    apt-utils \
    libpng-dev \
    libzip-dev \
    libxml2-dev \
    openssh-server \
    libmagickwand-dev \
    librdkafka-dev

RUN apt-get clean

RUN docker-php-ext-configure gd \
    --with-freetype=/usr/include/ \
    --with-jpeg=/usr/include/ \
    && docker-php-ext-configure intl \
    && docker-php-ext-install soap gd zip mysqli pdo_mysql intl exif \
    && docker-php-ext-enable intl \
    && docker-php-ext-enable exif \
    && docker-php-ext-install rdkafka \
    && docker-php-ext-enable rdkafka

COPY ./docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

# Install node js
RUN curl -sL $(echo https://deb.nodesource.com/setup_18.x | perl -pe 's/(.[0-9])$/x/g') -o nodesource_setup.sh \
    && bash nodesource_setup.sh \
    && apt-get install -qq nodejs

RUN chmod -R 777 /var/www

WORKDIR /var/www
