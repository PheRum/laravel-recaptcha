<?php

namespace PheRum\Recaptcha;

use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'pherum');
        
        $this->publishes([
            __DIR__ . '/config/recaptcha.php' => config_path('recaptcha.php'),
        ], 'config');
        
        $this->app->validator->extend('recaptcha', function ($attribute, $value) {
            return app('recaptcha')->verify(app('request'));
        });
    }
    
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/recaptcha.php', 'recaptcha');
        
        $this->app->bind('recaptcha', function () {
            return new Recaptcha(config('recaptcha'));
        });
    }
}
