ARG PHP_VERSION=8.1
FROM php:${PHP_VERSION}-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    bash \
    curl \
    ca-certificates \
    openssl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    icu-dev \
    imagemagick-dev \
    libtool \
    make \
    autoconf \
    g++ \
    pcre-dev \
    && update-ca-certificates

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    mysqli \
    gd \
    zip \
    intl \
    bcmath \
    opcache \
    exif

# Install Redis and Imagick extensions via PECL
RUN pecl install redis imagick \
    && docker-php-ext-enable redis imagick

# Start PHP-FPM
WORKDIR /var/www/html

CMD ["php-fpm"]
