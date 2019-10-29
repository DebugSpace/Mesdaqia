<?php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::prefix('dashboard')->name('dashboard.')->group(function () {
            Route::get('/index', "DashboardController@orders")->name('index');
            Route::get('/Accept/{id}/{type}/{vendor}/{color}/{year}/{new}/{price}/{model}/{ownerID}/{Auction_type}/{location}/{Guarant}/{viewers}/{image}/{status}/{producttime}', "AcceptOrderController@Accept_car_order")->name('accept_car');
            Route::get('/Accept_jew/{id}/{type}/{material}/{weight}/{price}/{ownerID}/{new}/{Auction_type}/{Guarant}/{viewers}/{image}/{status}/{producttime}', "AcceptOrderController@Accept_jewelry_order")->name('accept_jewelry');
            Route::get('/Accept_high/{id}/{type}/{price}/{new}/{ownerID}/{Auction_type}/{Guarant}/{viewers}/{image}/{status}/{producttime}', "AcceptOrderController@Accept_highvalue_order")->name('accept_highvalue');
            Route::get('/Accept_vich/{id}/{type}/{year}/{model}/{vendor}/{color}/{new}/{status}/{ownerID}/{price}/{Auction_type}/{location}/{Guarant}/{viewers}/{image}/{producttime}', "AcceptOrderController@Accept_vichle_order")->name('accept_vichle');
            Route::get('/Accept_prop/{id}/{type}/{street}/{city}/{new}/{status}/{ownerID}/{floors}/{price}/{rooms}/{SizeInMeter}/{Auction_type}/{location}/{Guarant}/{viewers}/{image}/{producttime}', "AcceptOrderController@Accept_proparity_order")->name('accept_proparity');

            Route::get('/Reject/{ownerID}', "AcceptOrderController@Reject_order")->name('reject');
            Route::resource('users', 'UserController');
            Route::resource('cars', 'CarsController');
            Route::resource('jewleries', 'jewleriesController');
            Route::resource('highvalues', 'highvalueController');
            Route::resource('properties', 'propertiesController');
            Route::resource('vichles', 'vichlesController');

            Route::resource('controls', 'controlsheader');
            Route::resource('messages','messages');
            Route::resource('supports','supports');
            Route::resource('addtextimage','AddImageTextController');
            Route::resource('advertising','advertisController');
        });
    });
