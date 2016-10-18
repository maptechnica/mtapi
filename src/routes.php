<?php
    
Route::get  ('__mtapi', 'maptechnica\mtapi\MTAPIController@index')->name('__mtapi');

Route::get  ('__mtapi-check-installation', 'maptechnica\mtapi\MTAPIController@checkInstallation')->name('__mtapi-check-installation');

Route::match(['get', 'post'], '__mtapi-tester', 'maptechnica\mtapi\MTAPIController@tester')->name('__mtapi-tester');
