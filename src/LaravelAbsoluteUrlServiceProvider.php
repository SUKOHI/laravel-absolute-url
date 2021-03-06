<?php namespace Sukohi\LaravelAbsoluteUrl;

use Illuminate\Support\ServiceProvider;

class LaravelAbsoluteUrlServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var  bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravel-absolute-url', function(){

            return new LaravelAbsoluteUrl;

        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-absolute-url'];
    }

}