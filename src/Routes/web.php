<?php

Route::group([
        'middleware' => ['web', 'rb28dett.base', 'rb28dett.auth'],
        'prefix'     => config('rb28dett.settings.base_url'),
        'namespace'  => 'RB28DETT\Dashboard\Controllers',
        'as'         => 'rb28dett::',
    ], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });
