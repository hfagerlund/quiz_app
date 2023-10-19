# quiz_app
Quiz API backend using [Laravel 10], Sail (docker-compose), [GraphQL] with [Vue 3] front-end.

[![Laravel Version](https://img.shields.io/badge/laravel-v10.10.0-%23f9322c.svg?style=flat-square)](https://laravel.com/) [![Composer Version](https://img.shields.io/badge/composer-v2.5.5-%234444ff.svg?style=flat-square)](https://getcomposer.org/) [![Composer package: rebing/graphql-laravel Version](https://img.shields.io/badge/laravel/rebinggraphql-v1.22.0-%23d64292.svg?style=flat-square)](https://github.com/rebing/graphql-laravel) [![Composer package: laravel/sail Version](https://img.shields.io/badge/laravel/sail-v1.22.0-%2338bdf7.svg?style=flat-square)](https://github.com/laravel/sail) [![PHP Version](https://img.shields.io/badge/php-v8.2.5-%238892bf.svg?style=flat-square)](https://php.net/) [![PHPUnit Version](https://img.shields.io/badge/phpunit-v10.1.2-%2321ffff.svg?style=flat-square)](https://phpunit.de/) [![MySQL Version](https://img.shields.io/badge/mysql-v8.0-%230074a3.svg?style=flat-square)](https://www.mysql.com/) [![Vite Version](https://img.shields.io/badge/vite-v4.4.11-%23646cff.svg?style=flat-square)](https://vitejs.dev/) [![Vue Version](https://img.shields.io/badge/vue-v3.2.36-%2342b883.svg?style=flat-square)](https://vuejs.org/) [![Tailwind CSS Version](https://img.shields.io/badge/tailwind-v4.0.0-%2338bdf8.svg?style=flat-square)](https://tailwindcss.com/)

## What's going on here?
* [Laravel] - v10.10.0
* [PHP]     - v8.2.5
* [PHPUnit] - v10.1.2

* [Node]    - v18.16.0
* [npm]     - v9.6.4

(All copyrights for the above remain with their respective owners.)

## Quick start
```console
# clone this project
$ git clone https://github.com/hfagerlund/quiz_app.git
$ cd quiz_app
$ cp .env.example .env
# ...and create .env.testing, customize .env and /config/database.php for your db

$ composer install --ignore-platform-reqs

# start Sail (leave this running in its own terminal tab)
$ ./vendor/bin/sail up

# in a new terminal tab:
$ ./vendor/bin/sail npm install
$ ./vendor/bin/sail artisan key:generate
$ ./vendor/bin/sail artisan migrate:fresh --seed
$ ./vendor/bin/sail npm run dev
# browse to 0.0.0.0
```

### Useful Tips
```console
# stop Sail
$ ./vendor/bin/sail down

# check state of services
$ docker-compose ps
```

<details>
<summary><strong>Differences between .env and .env.testing [+]</strong></summary>

<br />

| .env        |  .env.testing          |
| ------------- | ------------- |
| APP_ENV=local  | APP_ENV=testing  |
| DB_CONNECTION=mysql  | DB_CONNECTION=test1 (corresponds to `<env name="DB_CONNECTION" value="test1" />` in phpunit.xml)  |
| DB_DATABASE=db_for_application  | DB_DATABASE=db_for_testing (corresponds to `<env name="DB_DATABASE" value="db_for_testing"/>`, `<env name="APP_ENV" value="db_for_testing"/>` in phpunit.xml) |
</details>

## Tests
```console
# run all tests (feature, unit, database etc.)
$ ./vendor/bin/sail artisan test
# run all tests (for front-end, Vue components)
$ ./vendor/bin/sail npm run test

# run a specific test
$ ./vendor/bin/sail test --testsuite Feature --filter=DatabaseTest

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
# install Laravel 10 app (including Sail, MySQL, Redis, Selenium)
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
  <summary><strong>Database [+]</strong> <em>running migrations, seeders, db schema, db client</em></summary>

<br />

```console
# run migrations
$ ./vendor/bin/sail artisan migrate

# drop all tables, migrate, seed db
$ ./vendor/bin/sail artisan migrate:fresh --seed

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
Copyright &copy; 2023 Heini Fagerlund. [License] applies to all parts of quiz_app that are not externally maintained libraries, frameworks.

The [Laravel] framework is open-sourced software licensed under the [MIT license].


[GraphQL]: https://github.com/rebing/graphql-laravel
[Laravel]: https://laravel.com/
[Laravel 10]: https://laravel.com/
[License]: https://github.com/hfagerlund/quiz_app/blob/main/LICENSE
[MIT license]: https://opensource.org/licenses/MIT
[Node]: https://nodejs.org/
[npm]: https://www.npmjs.com/
[PHP]: https://www.php.net/
[PHPUnit]: https://phpunit.de/
[Vue 3]: https://vuejs.org/
