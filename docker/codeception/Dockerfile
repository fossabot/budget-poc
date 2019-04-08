FROM jeckel/php-test:7.3-cli-alpine

RUN apk --no-cache add postgresql-dev && \
    docker-php-ext-install pdo pdo_pgsql