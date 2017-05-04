# Todos backend <small>and others</small>

[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/acacha/todosBackend)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/acacha/todosBackend)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/acacha/todosBackend)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/acacha/todosBackend)
[![StyleCI](https://styleci.io/repos/84971563/shield?branch=master)](https://styleci.io/repos/84971563)

Respository of an API that implements CRUD operations of todos and users.

FrontEnd project with vue.js.

##Installation

Clone the repository via github:

```
$ git clone https://github.com/davidmgilo/todosBackend.git
```

Install the dependencies:

```
$ composer install
```

```
$ npm install
```

Set up the environment:

```
$ cp .env.example .env
```

Comment every DB variable  except DB_CONNECTION and set it to sqlite.

Create the database:

```
$ touch database/database.sqlite
 ```
Generate the artisan key:

```
$ php artisan key:generate
```

Generate the passport keys:

```
$ php artisan passport:keys
```

##Usage

You can set up the database through:

```
$ php artisan migrate --seed
```

Use it through a local server as in:

```
$ llum serve
```

Or:

```
$ php artisan serve
```

## Testing

Through PHPUnit:

```
$ phpunit
```

## Contact

By email: rogerforne@iesebre.com