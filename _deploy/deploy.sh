#!/bin/bash

# Deploy - to be executed as normal user

cd /var/www/lookmypics.com

php artisan down

sudo chown -R marco:www-data .
git pull
composer install --no-interaction --optimize-autoloader --no-dev
npm install
npm run build

php artisan storage:link
php artisan optimize:clear

php artisan down

php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan filament:upgrade

sudo chown -R www-data:www-data .

php artisan up
