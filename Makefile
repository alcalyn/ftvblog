all: run install fixtures

bash:
	docker exec -ti ftvblog-php /bin/bash

install:
	docker exec -ti ftvblog-php /bin/bash -c "composer install"
	docker exec -ti ftvblog-php /bin/bash -c "bin/console doctrine:database:create"
	docker exec -ti ftvblog-php /bin/bash -c "bin/console doctrine:schema:create"

run:
	docker-compose up -d

fixtures:
	docker exec -ti ftvblog-php /bin/bash -c "bin/console khepin:yamlfixtures:load"

chmod:
	sudo chmod -R 777 var/*

test:
	docker exec -ti ftvblog-php /bin/bash -c "vendor/bin/phpunit"
