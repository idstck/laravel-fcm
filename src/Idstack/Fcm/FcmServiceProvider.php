<?php
/**
 * Created by PhpStorm.
 * User: kiddie
 * Date: 11/18/17
 * Time: 9:47 PM
 */

namespace Idstack\Fcm;

use Illuminate\Support\ServiceProvider;
class FcmServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/fcm.php' => config_path('fcm.php'),
        ]);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('fcm', function ($app) {
            return $this->app->make('Idstack\Fcm\FcmExc');
        });
    }
}