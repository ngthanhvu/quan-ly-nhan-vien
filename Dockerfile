FROM php:8.3-fpm

ARG NODE_MAJOR=20

# Install system dependencies (đã bỏ Swoole-related: libssl-dev, build tools vẫn giữ vì PHP cần)
RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        curl \
        git \
        unzip \
        zip \
        ca-certificates \
        gnupg2 \
        build-essential \
        lsb-release \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        libzip-dev \
        libonig-dev \
        libxml2-dev \
        pkg-config \
        supervisor \
        inotify-tools; \
    curl -fsSL https://deb.nodesource.com/setup_${NODE_MAJOR}.x | bash -; \
    apt-get install -y --no-install-recommends nodejs; \
    \
    docker-php-ext-configure gd --with-jpeg --with-freetype; \
    docker-php-ext-install \
        bcmath \
        exif \
        gd \
        mbstring \
        pcntl \
        pdo_mysql \
        sockets \
        zip; \
    \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy your entrypoint
COPY entrypoint.sh /usr/local/bin/app-entrypoint
RUN chmod +x /usr/local/bin/app-entrypoint

ENTRYPOINT ["app-entrypoint"]

EXPOSE 9000

CMD ["php-fpm"]
