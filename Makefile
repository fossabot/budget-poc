.PHONY: up composer codeception

up:
	@docker-compose up

composer:
	@docker-compose run --rm --no-deps codeception composer ${CMD}

codeception:
	@docker-compose run --rm --no-deps codeception ./vendor/bin/codecept ${CMD}

test:
	@docker-compose run --rm codeception ./vendor/bin/codecept run