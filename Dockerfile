FROM php:8.3-fpm-alpine

# Alpine Linux で必要なパッケージをインストール
RUN apk add --no-cache \
    nginx \
    php83-pdo_pgsql \
    php83-mbstring \
    php83-exif \
    php83-pcntl \
    php83-bcmath \
    php83-gd \
    php83-ctype \
    php83-json \
    php83-openssl \
    nodejs \
    npm

# PHP拡張機能を有効化
RUN docker-php-ext-install pdo pdo_pgsql \
    && docker-php-ext-enable pdo_pgsql

# Composer をコピー
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . /var/www/html

# storageディレクトリのパーミッション設定とシンボリックリンク作成
RUN chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache \
    && mkdir -p /var/www/html/public \
    && if [ ! -L /var/www/html/public/storage ]; then ln -s /var/www/html/storage/app/public /var/www/html/public/storage; fi

# Composer と NPM の依存関係をインストールし、フロントエンドをビルド
RUN composer install --no-dev --optimize-autoloader \
    && npm install \
    && npm run build \
    && rm -rf node_modules

# Nginx と PHP-FPM の設定ファイルをコピー
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY docker/php-fpm/www.conf /usr/local/etc/php-fpm.d/www.conf

# ドキュメントルートを public に設定
WORKDIR /var/www/html/public

# ポートの公開
EXPOSE 80 9000

# 起動スクリプトのコピーと実行権限付与
COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# コンテナ起動時に実行されるコマンド
CMD ["start.sh"]