FROM jeckel/php-test:7.3-fpm-alpine

RUN apk --no-cache add postgresql-dev && \
    docker-php-ext-install pdo pdo_pgsql