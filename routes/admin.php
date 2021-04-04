<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/



    /*
    |--------------------------------------------------------------------------
    | Admin Auth
    |--------------------------------------------------------------------------
    | Here is where admin auth routes exists for login and log out
    */
    Route::group([
        'namespace'  => 'Auth',
    ], function() {
        Route::get('login', ['uses' => 'LoginController@showLoginForm','as'=>'admin.login']);
        Route::post('login', ['uses' => 'LoginController@login']);
        Route::group([
            'middleware' => 'App\Http\Middleware\RedirectIfAuthenticatedAdmin',
        ], function() {
            Route::post('logout', ['uses' => 'LoginController@logout','as'=>'admin.logout']);
        });
    });
    /*
    |--------------------------------------------------------------------------
    | Admin After login in
    |--------------------------------------------------------------------------
    | Here is where admin panel routes exists after login in
    */
    Route::group([
        'middleware'  => ['App\Http\Middleware\RedirectIfAuthenticatedAdmin'],
    ], function() {
        Route::get('/', 'HomeController@index');

        /*
        |--------------------------------------------------------------------------
        | Admins
        |--------------------------------------------------------------------------
        | Here is where Admins routes
        */
        Route::group([
            'prefix'=>'admins'
        ],function () {
            Route::resource('/','AdminController');
            Route::get('/{admin}/edit','AdminController@edit');
            Route::put('/{admin}','AdminController@update');
            Route::delete('/destroy','AdminController@destroy');
            Route::patch('/update/password',  'AdminController@updatePassword');
            Route::get('/option/export','AdminController@export');
            Route::get('/{id}/activation','AdminController@activation');
        });
        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        | Here is where Categories routes
        */
        Route::group([
            'prefix'=>'categories'
        ],function () {
            Route::resource('/','CategoryController');
            Route::get('/{category}/edit','CategoryController@edit');
            Route::get('/{category}/certification','CategoryController@certification');
            Route::put('/{category}/certification','CategoryController@postCertification');
            Route::get('/{category}/upload','CategoryController@upload');
            Route::post('/{category}/upload','CategoryController@postUpload');
            Route::put('/{category}','CategoryController@update');
            Route::delete('/destroy','CategoryController@destroy');
            Route::get('/option/export','CategoryController@export');
        });
        /*
        |--------------------------------------------------------------------------
        | Certifications
        |--------------------------------------------------------------------------
        | Here is where Categories routes
        */
        Route::group([
            'prefix'=>'certifications'
        ],function () {
            Route::resource('/','CertificationController');
            Route::get('/{certification}/edit','CertificationController@edit');
            Route::put('/{certification}','CertificationController@update');
            Route::delete('/destroy','CertificationController@destroy');
            Route::get('/option/export','CertificationController@export');

        });
    });

