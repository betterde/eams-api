ARG TAG=7.4.33-fpm
FROM php:${TAG}

LABEL maintainer="George King <george@betterde.com>"

#  Set timezone
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install php extension
RUN set -eux; \
    apt-get update; \
    apt-get upgrade -y; \
    apt-get install -y --no-install-recommends \
        git zip unzip libicu-dev libpq-dev libzip-dev openssl libssl-dev \
        libcurl4-openssl-dev libmagickwand-dev \
        libmagickcore-dev libfreetype6-dev libjpeg-dev \
        libwebp-dev libpng-dev pkg-config; \
    docker-php-ext-configure gd --prefix=/usr --with-webp --with-jpeg --with-freetype; \
    docker-php-ext-install -j$(nproc) gd; \
    docker-php-ext-configure intl; \
    docker-php-ext-install intl; \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql; \
    docker-php-ext-install zip; \
    docker-php-ext-install exif; \
    docker-php-ext-install pcntl; \
    docker-php-ext-install pgsql; \
    docker-php-ext-install bcmath; \
    docker-php-ext-install mysqli; \
    docker-php-ext-install opcache; \
    docker-php-ext-install pdo_pgsql; \
    docker-php-ext-install pdo_mysql; \
    pecl install lzf; \
    pecl install zstd; \
    pecl install igbinary; \
    pecl install redis; \
    pecl install imagick; \
    docker-php-ext-enable lzf zstd igbinary redis imagick; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*; \
    rm /var/log/lastlog /var/log/faillog

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    EXPECTED_CHECKSUM="$(php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '$EXPECTED_CHECKSUM') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

ARG WORKDIR=/usr/wwwroot
WORKDIR ${WORKDIR}

# Configure non-root user.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data; \
    usermod -o -u ${PUID} -g www-data www-data

# Configure locale.
ARG LOCALE=POSIX
ENV LC_ALL ${LOCALE}

CMD ["php-fpm"]

# FAST-CGI Port
EXPOSE 9000

# PHP-FPM Status Port
EXPOSE 9001