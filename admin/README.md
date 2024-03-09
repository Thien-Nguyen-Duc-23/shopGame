# APP SHOP GAME

## 1. Install project

**Clone repo**

```
$ git clone git@gitlab.com:uthienth92/admin.git
```

**Install component**

Copy `.env.example` to `.env`

```
$ cp .env.example .env
```

Install php compoments

```
$ composer install
```

Install front end components

```
$ npm install
```

Update compoments & update plugin php

```
$ composer install && composer dumpautoload
```

## 2. Config project

**Generate APP_KEY**

```
$ php artisan key:generate
```

`APP_ENV` is `development`, or `staging`, or `production`.


Laravel have supported many database, but alireviews use mysql as primary database, one for manage shops and comments, one for manage products.

Change your config database 

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=app_japan
DB_USERNAME=root
DB_PASSWORD=root
```
**Migrate schame database**

```
$ php artisan migrate:install && php artisan migrate
```


## 3. Run project

Project run on [Laravel 5.8](https://laravel.com/docs/5.4/), php7.\*, and node8.\*

**Run server local**


```
$ php artisan serve --port=8888
```


**Run npm**

```
$ npm run watch
```