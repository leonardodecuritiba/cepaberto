<?php
/**
 * Created by PhpStorm.
 * User: roberson.faria
 * Date: 25/01/16
 * Time: 16:55
 */

namespace Rfweb\Cepaberto\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Rfweb\Cepaberto\Facade\CepAberto;

class CepabertoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/cepaberto.php' => config_path('cepaberto.php'),
        ], 'config');

        $loader = AliasLoader::getInstance();
        $loader->alias('CepAberto', CepAberto::class);

        require(__DIR__."/../Http/routes.php");
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/cepaberto.php', 'cepaberto'
        );

        $this->app->bind('cepaberto', 'Rfweb\Cepaberto\CepAbertoRest' );
    }
}