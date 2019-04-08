.PHONY: up composer codeception test phpstan

up:
	@docker-compose up

composer:
	@docker-compose run --rm --no-deps codeception composer ${CMD}

codeception:
	@docker-compose run --rm --no-deps codeception ./vendor/bin/codecept ${CMD}

test:
	@docker-compose run --rm codeception ./vendor/bin/codecept run

test-cover:
	@docker-compose run --rm codeception ./vendor/bin/codecept run --coverage --coverage-html

phpstan:
	@docker-compose run --rm --no-deps codeception ./vendor/bin/phpstan analyse

phpcs:
	@docker-compose run --rm --no-deps codeception vendor/bin/phpcs

phpmd:
	@docker-compose run --rm --no-deps codeception vendor/bin/phpmd src text cleancode,codesize,design,naming,unusedcode

qa: test phpstan phpcs phpmd
