#!/bin/bash

#!/bin/bash

# Deploy - to be executed as normal user

cd /var/www/lookmypics.com || exit

php artisan down

git reset --hard origin/main
git pull
composer install --no-interaction --optimize-autoloader --no-dev
npm install
npm run build

php artisan filament:optimize-clear

php artisan down

php artisan migrate --force
php artisan optimize:clear
php artisan optimize
php artisan filament:optimize

chmod -R 777 /var/www/lookmypics.com/storage

php artisan up
