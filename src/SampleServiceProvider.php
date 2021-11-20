<?php

namespace GroupSystem\Sample;

use Illuminate\Support\ServiceProvider;

class SampleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /**
         * パッケージ開発
         * https://readouble.com/laravel/5.7/ja/packages.html
         * 
         * サービスプロバイダ
         * https://readouble.com/laravel/5.7/ja/providers.html
         */
        
        //configを公開
        $this->publishes([
            __DIR__.'/../config/sample.php' => config_path('group_system_sample.php'),
        ]);

        //routesをロード
        $this->loadRoutesFrom(__DIR__.'/../routes/sample.php');

        //migrationsをロード
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        //viewsをロード
        $this->loadViewsFrom(__DIR__.'/../views', 'group_system_sample');
        //viewsを公開
        $this->publishes([
            __DIR__.'/../views' => resource_path('views/vendor/group_system/sample'),
        ]);
        
    }

    public function register()
    {
        //configをマージ
        $this->mergeConfigFrom(
            __DIR__.'/../config/sample.php', 'group_system_sample'
        );
    }
}
