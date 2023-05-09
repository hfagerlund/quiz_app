# quiz_app
Quiz API backend using Laravel 10, Sail, Docker with Vue front-end.

## What's going on here?
* Laravel - v10.7.1
* PHP     - v8.2.5

* Node    - v18.16.0
* npm     - v9.6.4

(All copyrights for the above remain with their respective owners.)

## Quick start
```console
# clone this project
$ git clone https://github.com/hfagerlund/quiz_app.git
$ cd quiz_app

# start Sail
$ ./vendor/bin/sail up
# stop Sail
$ ./vendor/bin/sail down

# check state of services
$ docker-compose ps

# run front-end app (ie. Vite dev server)
$ ./vendor/bin/sail npm run dev
## browse to http://localhost
```

## Tests
```console
# run all tests
$ ./vendor/bin/sail artisan test

# run a specific test
## where test = 'test_example', file = './tests/Feature/HTTPResponseTest.php'
$ ./vendor/bin/sail artisan test --filter test_example ./tests/Feature/HTTPResponseTest.php

# generate (feature) test
$ ./vendor/bin/sail php artisan make:test HTTPResponseTest

# generate (unit) test
$ ./vendor/bin/sail php artisan make:test MyUnitTest --unit

# output code coverage stats to terminal
$ ./vendor/bin/sail php artisan test --coverage

# install Dusk (end-to-end testing, browser automation)
$ ./vendor/bin/sail composer require --dev laravel/dusk
$ ./vendor/bin/sail php artisan dusk:install
```

### Good to Know (miscellaneous commands)
<!-- .................... -->
<details>
  <summary><strong>Auto-generate code [+]</strong> <em>models, migrations, factories, GraphQL schema</em></summary>

<br />

```console
# generate model, migration
$ ./vendor/bin/sail artisan make:model -m Question

# generate model, migration, factory
$ ./vendor/bin/sail artisan make:model Question -m -f

# generate GraphQL type
$ ./vendor/bin/sail artisan make:graphql:type QuestionType
```

</details>
<!-- .................... -->
<details>
  <summary><strong>Installation [+]</strong> <em>Laravel 10, libraries</em></summary>

<br />

```console
# install Laravel 10 app (including Sail, MySQL, Redis, Selnium)
$ curl -s https://laravel.build/new-sail-application | bash

# install library for GraphQL
$ ./vendor/bin/sail composer require rebing/graphql-laravel
## publish config file (from /vendor dir to /config/graphql.php)
$ ./vendor/bin/sail php artisan vendor:publish --provider="Rebing\GraphQL\GraphQLServiceProvider"
```

</details>
<!-- .................... -->
<details>
  <summary><strong>Configuration [+]</strong> <em>caching configuration, switching environments</em></summary>

<br />

```console
# cache configuration
$ ./vendor/bin/sail php artisan config:cache --env=testing

# clear configuration cache
$ ./vendor/bin/sail php artisan config:clear
```

</details>
<!-- .................... -->
<details>
  <summary><strong>Database [+]</strong> <em>running migrations, db schema, db client</em></summary>

<br />

```console
# run migrations
$ ./vendor/bin/sail artisan migrate

# dump database schema (ie. 'squash' migrations into a single SQL file)
$ ./vendor/bin/sail php artisan schema:dump

# access MySQL command-line client
$ ./vendor/bin/sail mysql
```

</details>
<!-- .................... -->
<details>
  <summary><strong>Front-end Vue app [+]</strong> <em>running Node, npm, Vite dev server</em></summary>

<br />

```console
# Node, npm versions
$ ./vendor/bin/sail node -v
$ ./vendor/bin/sail npm -v

# run Vite development server (provides Hot Module Replacement for Laravel application)
$ ./vendor/bin/sail npm run dev
```

</details>

## License
Copyright (c) 2023 Heini Fagerlund. Refer to [License](https://github.com/hfagerlund/quiz_app/blob/main/LICENSE).

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
