.RECIPEPREFIX +=
.DEFAULT_GOAL := help

help:
	@echo "welcome to IT Support"

install:
	@composer install

untest:
	@docker exec crm_php ./vendor/bin/phpunit

pesttest:
	@docker exec crm_php ./vendor/bin/pest 

test: 
	@docker exec crm_php php artisan test

migrate: 
	@docker exec crm_php php artisan migrate

fresh: 
	@docker exec crm_php php artisan migrate:fresh 

analyse:
	./vendor/bin/phpstan analyse

seed:
	@docker exec crm_php php artisan db:seed


generate:
	@docker exec crm_php php artisan ide-helper:models --write

nginx:
	@docker exec -it crm_nginx /bin/sh

php:
	@docker exec -it crm_php /bin/sh

mysql:
	@docker exec -it crm_mysql /bin/sh

redis:
	@docker exec -it crm_redis /bin/sh
