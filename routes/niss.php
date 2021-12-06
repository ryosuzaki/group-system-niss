<?php


/**
 * ルーティング
 * https://readouble.com/laravel/5.7/ja/routing.html
 */

Route::name('niss.')->prefix('niss')->namespace('GroupSystem\Niss\Http\Controllers')->middleware(['web','auth'])->group(function(){
    
    Route::name('evacuation.')->prefix('evacuation')->group(function(){
        Route::put('', 'EvacuationController@update')->name('update');
    });

    Route::name('rescue.')->prefix('rescue')->group(function(){
        Route::prefix('group/{group}/user/{user}')->group(function(){
            Route::get('rescue', 'RescueController@rescue')->name('rescue');
            Route::get('unrescue', 'RescueController@unrescue')->name('unrescue');
            Route::get('rescued', 'RescueController@rescued')->name('rescued');
        });
    });

    Route::name('health_record.')->prefix('health_record')->group(function(){
        Route::put('', 'HealthRecordController@update')->name('update');
        Route::get('setting', 'HealthRecordController@setting')->name('setting');
        Route::put('setting', 'HealthRecordController@updateSetting')->name('update_setting');
    });
});






