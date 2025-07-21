#!/bin/sh
# docker/start.sh

# PHP-FPM をバックグラウンドで起動
php-fpm -D

# Nginx を起動し、フォアグラウンドで実行
nginx -g "daemon off;"