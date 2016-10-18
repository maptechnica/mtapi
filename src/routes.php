<?php
    
Route::get  ('__mtapi', 'MapTechnica\MTAPI\MTAPIController@index')->name('__mtapi');

Route::get  ('__mtapi-check-installation', 'MapTechnica\MTAPI\MTAPIController@checkInstallation')->name('__mtapi-check-installation');

Route::match(['get', 'post'], '__mtapi-tester', 'MapTechnica\MTAPI\MTAPIController@tester')->name('__mtapi-tester');
