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

Auth::routes();

Route::view('/home', 'home');

Route::group(['prefix' => '/type', 'as' => 'type.'], function() {
    Route::get('/index', 'TypeController@index')->name('index');
    Route::get('/create', 'TypeController@create')->name('create');
    Route::post('/store', 'TypeController@store')->name('store');
    Route::get('/edit/{type}', 'TypeController@edit')->name('edit');
    Route::post('/update/{type}', 'TypeController@update')->name('update');
    Route::post('/delete/{type}', 'TypeController@delete')->name('delete');
});

Route::group(['prefix' => '/criterion', 'as' => 'criterion.'], function() {
    Route::get('/{type}/index', 'CriterionController@index')->name('index');
    Route::get('/{type}/create', 'CriterionController@create')->name('create');
    Route::post('/{type}/store', 'CriterionController@store')->name('store');
    Route::get('/edit/{criterion}', 'CriterionController@edit')->name('edit');
    Route::post('/update/{criterion}', 'CriterionController@update')->name('update');
    Route::post('/delete/{criterion}', 'CriterionController@delete')->name('delete');
});

Route::group(['prefix' => '/sub-criterion', 'as' => 'sub-criterion.'], function() {
    Route::get('/{criterion}/index', 'SubCriterionController@index')->name('index');
    Route::get('/{criterion}/create', 'SubCriterionController@create')->name('create');
    Route::post('/{criterion}/store', 'SubCriterionController@store')->name('store');
    Route::get('/edit/{sub-criterion}', 'SubCriterionController@edit')->name('edit');
    Route::post('/update/{sub-criterion}', 'SubCriterionController@update')->name('update');
    Route::post('/delete/{sub-criterion}', 'SubCriterionController@delete')->name('delete');
});

Route::group(['prefix' => '/survey-form', 'as' => 'survey-form.'], function() {
    Route::get('/show', 'SurveyFormController@show')->name('show');
});

Route::redirect('/', '/type/index');