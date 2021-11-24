<?php

namespace GroupSystem\Niss;

use Illuminate\Support\ServiceProvider;

class NissServiceProvider extends ServiceProvider
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
            __DIR__.'/../config/group_system_niss.php' => config_path('group_system_niss.php'),
        ]);

        //routesをロード
        $this->loadRoutesFrom(__DIR__.'/../routes/niss.php');

        //migrationsをロード
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        //viewsをロード
        $this->loadViewsFrom(__DIR__.'/../views', 'group_system_niss');
    }

    public function register()
    {
        //configをマージ
        $this->mergeConfigFrom(
            __DIR__.'/../config/group_system_niss.php', 'group_system_niss'
        );
        //
        $this->mergeConfigFrom(
            __DIR__.'/../config/merge_to_group_system.php', 'group_system'
        );
    }
}
