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
Route::get('admin/login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('admin/login', [
  'as' => '',
  'uses' => 'Auth\LoginController@login'
]);
Route::group(['prefix' => 'admin'], function() {
	Route::get('logout', [
	  'as' => 'logout',
	  'uses' => 'Auth\LoginController@logout'
	]);
	Route::group(['prefix' => 'category'], function() {
		Route::get('/{name}', [
		  'as' => 'categoryIndex',
		  'uses' => 'Admin\CategoryController@index'
		]);
		Route::post('/{name}', [
		  'as' => '',
		  'uses' => 'Admin\CategoryController@tableData'
		]);
		Route::get('/{name}/new', [
		  'as' => 'categoryNew',
		  'uses' => 'Admin\CategoryController@create'
		]);
		Route::post('/{name}/new', [
		  'as' => '',
		  'uses' => 'Admin\CategoryController@store'
		]);
		Route::get('/{name}/edit/{id}', [
		  'as' => 'categoryEdit',
		  'uses' => 'Admin\CategoryController@edit'
		]);
		Route::post('/{name}/edit/{id}', [
		  'as' => '',
		  'uses' => 'Admin\CategoryController@update'
		]);
		Route::post('/{name}/getselect', [
		  'as' => '',
		  'uses' => 'Admin\CategoryController@getTree'
		]);
		Route::post('/{name}/gettree', [
		  'as' => '',
		  'uses' => 'Admin\CategoryController@getCategory'
		]);
		Route::delete('/{id}', [
		  'as' => '',
		  'uses' => 'Admin\CategoryController@destroy'
		]);
	});
	Route::group(['prefix' => 'program'], function() {
		Route::get('/', [
		  'as' => 'programIndex',
		  'uses' => 'Admin\ProgramController@index'
		]);
		Route::post('/', [
		  'as' => '',
		  'uses' => 'Admin\ProgramController@tableData'
		]);
		Route::get('/new', [
		  'as' => 'programNew',
		  'uses' => 'Admin\ProgramController@create'
		]);
		Route::post('/new', [
		  'as' => '',
		  'uses' => 'Admin\ProgramController@store'
		]);
		Route::get('/edit/{id}', [
		  'as' => 'programEdit',
		  'uses' => 'Admin\ProgramController@edit'
		]);
		Route::post('/edit/{id}', [
		  'as' => '',
		  'uses' => 'Admin\ProgramController@update'
		]);
		Route::delete('/{id}', [
		  'as' => '',
		  'uses' => 'Admin\ProgramController@destroy'
		]);
	});
	Route::get('filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
});
