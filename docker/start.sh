#!/bin/sh

# Nginxを起動（フォアグラウンドで）
nginx -g "daemon off;" &

# PHP-FPMを起動（フォアグラウンドで）
php-fpm

# ここに到達しない限り、コンテナは実行され続けるらしい！