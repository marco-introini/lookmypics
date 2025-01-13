check:
	vendor/bin/phpstan
	vendor/bin/rector --dry-run

recreate:
	rm -f storage/logs/laravel.log
	php artisan migrate:fresh --seed

