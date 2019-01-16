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
=======

        Route::get('/', 'HomeController@home');
        Route::get('/course', 'HomeController@course');
        Route::get('/discussion', 'HomeController@discussion');

        Route::post('/lang', [
            'as' => 'switchLang',
            'uses' => 'LangController@postLang',
        ]);
  });
=======
Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'question'], function() {
        Route::get('list','QuestionController@index');
        Route::get('add','QuestionController@create');
        Route::post('add','QuestionController@store');
        Route::get('edit/{id}','QuestionController@edit');
        Route::post('edit/{id}','QuestionController@update');
        Route::get('delete/{id}','QuestionController@destroy');
    });
});

Route::group(['prefix' => 'ajax'], function() {
    Route::get('question/{idSubject}','AjaxController@get');
});
