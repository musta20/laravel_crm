.RECIPEPREFIX +=
.DEFAULT_GOAL := help

help:
	@echo "welcome to IT Support"

install:
	@composer install

test: 
	docker exec crm_php php artisan test

migrate: 
	docker exec crm_php php artisan migrate

analyse:
	./vendor/bin/phpstan analyse

generate:
	docker exec crm_php astisan ide-helper:models --write

nginx:
	docker exec -it crm_nginx /bin/sh

php:
	docker exec -it crm_php /bin/sh

mysql:
	docker exec -it crm_mysql /bin/sh

redis:
	docker exec -it crm_redis /bin/sh
