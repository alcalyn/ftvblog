all: run init

bash:
	docker exec -ti ftvblog-php /bin/bash

init:
	docker exec -ti ftvblog-php /bin/bash -c "composer install"
	docker exec -ti ftvblog-php /bin/bash -c "bin/console doctrine:database:create"
	docker exec -ti ftvblog-php /bin/bash -c "bin/console doctrine:schema:create"
	docker exec -ti ftvblog-php /bin/bash -c "bin/console khepin:yamlfixtures:load"

run:
	docker-compose up -d

chmod:
	sudo chmod -R 777 var/*

test:
	docker exec -ti ftvblog-php /bin/bash -c "vendor/bin/phpunit"
