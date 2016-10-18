# MapTechnicaAPI
A Composer package that lets you easily access the MapTechnica API.

**Project Home:** [https://github.com/maptechnica/mtapi](https://github.com/maptechnica/mtapi)

**Git Repository:** [https://github.com/maptechnica/mtapi](https://github.com/maptechnica/mtapi)

**API Documentation (Swagger):** [https://dev.maptechnica.com/apidocs/](https://dev.maptechnica.com/apidocs/)

The MapTechnica API makes it possible to access MapTechnica's boundary data directly into your mapping application.

This package is designed to work with Laravel 5+ or as a standalone package in your own composer-based project.

## Installation
Require this project from the root directory of your project:

```shell
composer require maptechnica\mtapi
```

### Laravel 5.x:

After updating composer, add the ServiceProvider to the providers array in config/app.php:

```php
maptechnica\mtapi\MapTechnicaAPIServiceProvider::class,
```

Add an alias to config/app.php:

```php
'MTAPI' => maptechnica\mtapi\Facade::class,
```

### Lumen:
For Lumen, register the service provider in `bootstrap/app.php`:

```php
$app->register(maptechnica\mtapi\MapTechnicaAPIServiceProvider::class);
```

To use the service provider in Lumen, import the facade each time:

```php
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
```

### Composer APP:
For your own Composer-based app, this package should work, though you will need to also require phpdotenv:

```shell
composer require vlucas/phpdotenv
```
If you don't already have one, create a .env file in your project root directory

## Post-Installation
Once Composer has done its thing.


