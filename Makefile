install:
	composer install

lint:
	composer run-script phpcs -- --standard=PSR12 src bin

dumpautoload:
	composer dump-autoload --optimize