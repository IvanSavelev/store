#!/bin/bash
rm -rf composer.lock
rm -rf vendor

composer self-update
composer install

rm -f public/storage
php artisan storage:link
php artisan migrate
php-fpm



