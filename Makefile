clean:


recreate:
	rm -f storage/logs/laravel.log
	php artisan migrate:fresh --seed

