check:
	vendor/bin/phpstan
	php artisan test

recreate:
	rm -f storage/app/public/avatars/*
	rm -f storage/app/public/images/*
	php artisan migrate:fresh --seed

update:
	@echo "Current Laravel Version"
	php artisan --version
	@echo "\nUpdating..."
	composer update
	php artisan config:clear
	php artisan route:clear
	php artisan view:clear
	php artisan filament:upgrade
	@echo "UPDATED Laravel Version"
	php artisan --version
	npm update

