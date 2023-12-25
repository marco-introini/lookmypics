check:
	vendor/bin/phpstan
	php artisan test

recreate:
	rm -f storage/app/public/avatars/*
	rm -f storage/app/public/images/*
	php artisan migrate:fresh --seed

