<?php

/*
|--------------------------------------------------------------------------
| MapTechnica API Package
|--------------------------------------------------------------------------
|
| This package provides Laravel users an easy way to access the
| MapTechnica API.
|
| You are free to use this code for your application. The MIT License
| covers the use of this code. 
| 
| @license MIT License [https://github.com/maptechnica/mtapi/blob/master/LICENSE] 
|
| Access to the MapTechnica API requires an API key which is subject to its
| own license and use restrictions. Obtain 
| @link API Keys from https://my.maptechnica.com/my-api-keys
|
| @version 0.0.1
| @author Steve Stringer <steve@maptechnica.com>
| @link Dev Community Forum at http://forum.maptechnica.com
| @link MapTechnica Support at http://help.maptechnica.com
*/

return [
 
    /*
    |--------------------------------------------------------------------------
    | MapTechnica API Key
    |--------------------------------------------------------------------------
    |
    | Obtain an API key here:
    | https://my.maptechnica.com/my-api-keys
    | 
    | A valid and active developer subscription is required.
    |
    */

    'apiKey'         => env('MAPTECHNICA_API_KEY', NULL),
    
    /*
    |--------------------------------------------------------------------------
    | API URL
    |--------------------------------------------------------------------------
    |
    | The full MTAPI URL. This should not change unless you have a corporate
    | developer's subscription and have a unique URL to a private API server.
    |
    */

    'apiUrl'     => env('MAPTECHNICA_API_URL', 'https://api.maptechnica.com'),
     
    /*
    |--------------------------------------------------------------------------
    | API Version
    |--------------------------------------------------------------------------
    |
    | You may access different versions of the MTAPI.
    | 
    | This number should correspond to the version number of the API you wish
    | to access.
    |
    | DO NOT include the "v" or any slashes; only include the version number.
    |
    | Good: 1
    | Bad: v1
    | Bad: v1/
    |
    */

    'apiVersion' => env('MAPTECHNICA_API_VERSION', '1'),
 
];