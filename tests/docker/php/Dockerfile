FROM php:7.3
RUN apt-get update \
    && apt-get install -y curl \
    && apt-get install -y libzip-dev \
    && docker-php-ext-install zip \
    && apt-get install -y libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && rm -rf /var/lib/apt/lists/* \
    && curl -L -o /tmp/composer-setup.php https://getcomposer.org/installer \
    && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm /tmp/composer-setup.php \
    && curl -L -o /usr/local/bin/php-cs-fixer https://cs.sensiolabs.org/download/php-cs-fixer-v2.phar \
    && chmod a+x /usr/local/bin/php-cs-fixer
COPY . /code
WORKDIR /code
ENTRYPOINT ["tests/docker/php/entrypoint.sh"]
