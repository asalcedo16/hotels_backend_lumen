FROM php:8.2-fpm-buster

# install dependencies
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install -j$(nproc) pdo pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create a non-root user with the same UID and GID as the host
ARG UID=1000
ARG GID=1000

RUN groupadd -g ${GID} appgroup \
    && useradd -m -u ${UID} -g appgroup appuser

USER appuser