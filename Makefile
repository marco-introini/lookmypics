check:
	./vendor/bin/rector --dry-run
	./vendor/bin/phpstan analyse
	./vendor/bin/pint --test
	./vendor/bin/pest


recreate:
	rm -f storage/logs/laravel.log
	php artisan migrate:fresh --seed

