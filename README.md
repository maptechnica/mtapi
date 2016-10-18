# MapTechnicaAPI
## Overview
`mtapi` is a composer package that lets you easily access the MapTechnica API from your Laravel application.  The MapTechnica API ("MT API") lets you retrieve GIS boundary, meta, and centroid data for the following geotypes:

* US ZIP Codes (ZCTA5s)
* ZIP Code Prefixes (ZIP3s)
* US Census Bureau Cities & Places
* Counties
* Congressional Districts
* School Districts
* Canadian FSAs and Provinces

You can see this data in action and learn more about the MapTechnica API on [MapTechnica.com](https://www.maptechnica.com).

> #### Note:
Free use of this package is covered under the MIT license. However, to access the MT API, you will need to obtain a license key which is subject to its own use restrictions and fees. Visit the [Developers seciton of MapTechnica.com](https://dev.maptechnica.com) for more information.

## Obtain a MapTechnica API Key
Go to MapTechnica.com and register for an account:

[https://my.maptechnica.com/register](https://my.maptechnica.com/register)

Once registered (or logged in), go to "[My Account](https://my.maptechnica.com/)" and click on [Subscriptions](https://my.maptechnica.com/my-subscriptions) in the sidebar and select the Developer option.

Once your Developer account is set up, click on [API Keys](https://my.maptechnica.com/my-api-keys) in the sidebar and obtain an API key.

## Package Installation
In a terminal, require the package from the root directory of your Laravel project:

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

Next, move the config file into the correct place. From your project's root directory, type:

```shell
php artisan vendor:publish
```

Open 
Open your `.env` file and add the following variables:

```php
MAPTECHNICA_API_KEY=PoQcE7sKcXjCgkEaJsLF5Lwb7ByhqXJYoAFpppAIt1C3ABp3Uqm4lXYxjo62Frj
MAPTECHNICA_API_VERSION=1
MAPTECHNICA_API_URL=http://api.maps3.dev
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

## Post-Installation
Once Composer has done its thing, and assuming your Laravel app is up and running, open...

```html
http://yourapp/__mtapi
```
...in your browser.


## Links

**Project Home:** [https://github.com/maptechnica/mtapi](https://github.com/maptechnica/mtapi)

**Git Repository:** [https://github.com/maptechnica/mtapi](https://github.com/maptechnica/mtapi)

**API Documentation (Swagger):** [https://dev.maptechnica.com/apidocs/](https://dev.maptechnica.com/apidocs/)

The MapTechnica API makes it possible to access MapTechnica's boundary data directly into your mapping application.

This package is designed to work with Laravel 5+ or as a standalone package in your own composer-based project.

