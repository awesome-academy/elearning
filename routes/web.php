<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'localization', 'prefix' => Session::get('locale')], function() {

        Route::get('/', 'HomeController@home');
        Route::get('/course', 'HomeController@course');
        Route::get('/discussion', 'HomeController@discussion');

        Route::post('/lang', [
            'as' => 'switchLang',
            'uses' => 'LangController@postLang',
        ]);
  });
