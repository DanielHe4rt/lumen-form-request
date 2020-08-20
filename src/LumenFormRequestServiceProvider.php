<?php

namespace danielhe4rt\LumenFormRequest;

use Illuminate\Contracts\Validation\ValidatesWhenResolved;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Http\Redirector;

class LumenFormRequestServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->afterResolving(ValidatesWhenResolved::class, function ($resolved) {
            $resolved->validateResolved();
        });

        $this->app->resolving(FormRequest::class, function ($request, $app) {
            $request = FormRequest::createFrom($app['request'], $request);
            $request->setContainer($app)->setRedirector($app->make(Redirector::class));
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
//        $this->mergeConfigFrom(__DIR__.'/../config/lumenformrequest.php', 'lumenformrequest');
//
//        // Register the service the package provides.
//        $this->app->singleton('lumenformrequest', function ($app) {
//            return new LumenFormRequest;
//        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['lumenformrequest'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/lumenformrequest.php' => config_path('lumenformrequest.php'),
        ], 'lumenformrequest.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/danielhe4rt'),
        ], 'lumenformrequest.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/danielhe4rt'),
        ], 'lumenformrequest.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/danielhe4rt'),
        ], 'lumenformrequest.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
