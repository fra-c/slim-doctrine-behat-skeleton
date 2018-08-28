# Slim & Behat Skeleton

Skeleton application using Slim 3 with Doctrine ORM and Behat. It also features migrations.

The following instructions assume you're using Docker.

## Install

Run the following command to create the project (replace [my-app-name]):

`$ docker run -it --rm -v $(pwd):/app composer create-project fra-c/slim-doctrine-behat-skeleton [my-app-name]`

Create an `.env` file and edit to your needs:

`$ cp .env.example .env`

## Run tests

Run Behat tests with:

`docker-compose run --rm -e DB_NAME=test_db -e LOG_FILENAME= php vendor/bin/behat`

**WARNING:** When you run tests, the database specified in `DB_NAME` will be dropped and recreated. If you don't specify `DB_NAME` in the command, the `.env` file or environment variables will be used. DO NOT USE production credentials.

## Composer command

To run composer:

`docker run -it --rm -v $(pwd):/app composer [command] [options] [...]`

Example:

`docker run -it --rm -v $(pwd):/app composer require --dev phpunit/phpunit`

## Migrations

### Creating migrations

Edit the Doctrine mapping yaml files as needed then run the following command to create a migration file:

`docker-compose run --rm php vendor/bin/doctrine-migrations migrations:diff`

### Migrating

Tests run migrations automatically before every scenario.

To update the local database instead run:

`docker-compose run --rm php vendor/bin/doctrine-migrations migrations:migrate`
