.PHONY: install up conole composer codeception test test-cover phpstan phpcs phpmd qa snippets

install:
	@docker-compose pull
	@docker-compose build --pull

up:
	@docker-compose up

console:
	@docker-compose run --rm codeception bin/console ${CMD}

composer:
	@docker-compose run --rm --no-deps codeception composer ${CMD}

codeception:
	@docker-compose run --rm --no-deps codeception ./vendor/bin/codecept ${CMD}

test:
	@docker-compose run --rm codeception ./vendor/bin/codecept run -vvv

test-cover:
	@docker-compose run --rm codeception ./vendor/bin/codecept run --coverage --coverage-html

phpstan:
	@docker-compose run --rm --no-deps codeception ./vendor/bin/phpstan analyse

phpcs:
	@docker-compose run --rm --no-deps codeception vendor/bin/phpcs

phpmd:
	@docker-compose run --rm --no-deps codeception vendor/bin/phpmd src text cleancode,codesize,design,naming,unusedcode

qa: test phpstan phpcs phpmd

snippets:
	@docker-compose run --rm codeception ./vendor/bin/codecept gherkin:snippets


.DEFAULT:
	@docker-compose run --rm codeception bin/console $@
