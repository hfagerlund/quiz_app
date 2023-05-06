# quiz_app
Quiz API backend using Laravel 10, Sail, Docker with Vue front-end.

## What's going on here?
* Laravel - v10.7.1
* PHP     - v8.2.5

(All copyrights for the above remain with their respective owners.)

## Quick start
```console
# start Sail
$ ./vendor/bin/sail up
# stop Sail
$ ./vendor/bin/sail down

# check state of services
$ docker-compose ps
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
  <summary>Auto-generate code <strong>[+]</strong></summary>

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
  <summary>Installation <strong>[+]</strong></summary>

<br />

```console
# install library for GraphQL
$ ./vendor/bin/sail composer require rebing/graphql-laravel
```

</details>
<!-- .................... -->
<details>
  <summary>Configuration <strong>[+]</strong></summary>

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
  <summary>Database <strong>[+]</strong></summary>

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

## License
Copyright (c) 2023 Heini Fagerlund. Refer to [License](https://github.com/hfagerlund/quiz_app/blob/main/LICENSE).

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
