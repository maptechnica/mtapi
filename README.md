# MapTechnicaAPI
*Current stable version: 1.0.2*

## Overview
`mtapi` is a composer package that lets you easily access the MapTechnica API from your Laravel application.  The MapTechnica API ("MT API") lets you retrieve GIS boundary, meta, and centroid data for the following geotypes:

* US Census Bureau Data:
	* ZIP Codes (ZCTA5s)
	* 3-Digit ZIP Code Prefixes (ZCTA3s)
	* Cities & Places
	* Counties
	* Congressional Districts for the current session
	* School Districts
* Canadian Boundary Data
	* FSAs (the three-character postal code prefix)
	* Provinces

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
MapTechnica\MTAPI\MTAPIServiceProvider::class,
```

Add an alias to config/app.php:

```php
'MTAPI' => MapTechnica\MTAPI\MTAPIDataRetriever::class,
```

Next, move the config file into the `config` directory. From your project's root directory, type:

```shell
php artisan vendor:publish
```

Now you have a choice. You can either directly alter the values in your `config\mtapi.php` file as follows:

*From:*

```php
'apiKey'         => env('MAPTECHNICA_API_KEY', NULL),
```

*To:*

```php
'apiKey'         => env('MAPTECHNICA_API_KEY', '[YOUR_API_KEY]'),
```

Or, if you're in an environment that requires different keys based on your server location, leave `config\mtapi.php` as-is and open your `.env` file and add the following variable instead

```php
MAPTECHNICA_API_KEY=[YOUR_API_KEY]
```

## Post-Installation
Once Composer has done its thing, and assuming your Laravel app is up and running, open...

```html
http://yourapp/__mtapi
```
...in your browser. You should see a links page.

### Check Your Installation
Click the "Check Installation" button to insure your variables are set correctly and the API is responding to your requests.

### Learning the API
Click the "API Documentation" button to view a Swagger playground and documentation for the API.

### Getting Help
There are several resources available to you if you run into trouble:

* **Developer Forum** - Ask for help and share solutions with your fellow developers at [http://forum.maptechnica.com/](http://forum.maptechnica.com/)
* **MapTechnica Support** - If you have found a bug or have encountered a problem not solved by the Forum, you can open a support ticket at [http://help.maptechnica.com/](http://help.maptechnica.com/).  Note that debugging your application is outside the scope of support for the API, so please limit your issues to bugs encountered with the API itself.


## Links

**Project Home:** [https://github.com/maptechnica/mtapi](https://github.com/maptechnica/mtapi)

**Git Repository:** [https://github.com/maptechnica/mtapi](https://github.com/maptechnica/mtapi)

**API Documentation (Swagger):** [https://dev.maptechnica.com/apidocs/](https://dev.maptechnica.com/apidocs/)

The MapTechnica API makes it possible to access MapTechnica's boundary data directly into your mapping application.

This package is designed to work with Laravel 5+ or as a standalone package in your own composer-based project.

