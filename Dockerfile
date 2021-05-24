FROM php:7.4-fpm
RUN echo "memory_limit = -1" >> $PHP_INI_DIR/php.ini
RUN echo "xdebug.client_host=host.docker.internal" >> $PHP_INI_DIR/php.ini
RUN echo "date.timezone = Europe/Moscow" >> $PHP_INI_DIR/php.ini
RUN echo "xdebug.mode=debug" >> $PHP_INI_DIR/php.ini

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

COPY --from=composer /usr/bin/composer /usr/bin/composer


RUN install-php-extensions \
    ldap \
    intl \
    ssh2 \
    imap \
    xdebug \
    mysqli \
    pdo_mysql \
    zip