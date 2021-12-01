<?php

namespace GroupSystem\Niss;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Arr;

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
        //group_systemにマージ
        $this->mergeConfigFrom(
            __DIR__.'/../config/merge_to_group_system.php', 'group_system'
        );
    }






    /**
     * デフォルトのmergeConfigFromは多次元配列のmergeに非対応なので、対応するように変更
     * https://medium.com/@koenhoeijmakers/properly-merging-configs-in-laravel-packages-a4209701746d
     */

    /**
     * Merge the given configuration with the existing configuration.
     *
     * @param  string  $path
     * @param  string  $key
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);

        $this->app['config']->set($key, $this->mergeConfig(require $path, $config));
    }

    /**
     * Merges the configs together and takes multi-dimensional arrays into account.
     *
     * @param  array  $original
     * @param  array  $merging
     * @return array
     */
    protected function mergeConfig(array $original, array $merging)
    {
        $array = array_merge($original, $merging);

        foreach ($original as $key => $value) {
            if (! is_array($value)) {
                continue;
            }

            if (! Arr::exists($merging, $key)) {
                continue;
            }

            if (is_numeric($key)) {
                continue;
            }

            $array[$key] = $this->mergeConfig($value, $merging[$key]);
        }

        return $array;
    }
}
