<?php


/**
 * ルーティング
 * https://readouble.com/laravel/5.7/ja/routing.html
 */

Route::name('sample.')->prefix('sample')->namespace('GroupSystem\Sample\Http\Controllers')->middleware(['web','auth'])->group(function(){
    Route::get('index', 'SampleController@index')->name('index');
});






