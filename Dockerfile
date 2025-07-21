# Dockerfile

FROM php:8.3-fpm-alpine

RUN apk add --no-cache nginx

RUN apk add --no-cache postgresql-dev

RUN apk add --no-cache oniguruma-dev

RUN apk add --no-cache zlib-dev

RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd ctype json openssl \
    && docker-php-ext-enable pdo_pgsql mbstring exif pcntl bcmath gd ctype json openssl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache nodejs npm

WORKDIR /var/www/html
COPY . /var/www/html

RUN composer install --no-dev --optimize-autoloader \
    && npm install \
    && npm run build \
    && rm -rf node_modules \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache

COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

COPY docker/php-fpm/www.conf /usr/local/etc/php-fpm.d/www.conf

WORKDIR /var/www/html/public

RUN mkdir -p /var/www/html/public/storage \
    && ln -s /var/www/html/storage/app/public /var/www/html/public/storage

EXPOSE 80 9000

COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

CMD ["start.sh"]