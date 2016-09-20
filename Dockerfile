FROM debian:wheezy

MAINTAINER erick.bogarin@gmail.com

RUN apt-get update && \
    apt-get install -y \
        php5-cli \
        php5-imagick \
        php5-intl \
        php5-mcrypt \
        php5-pgsql \
        php-apc && \
    rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin && \
    ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

COPY app/ /app

