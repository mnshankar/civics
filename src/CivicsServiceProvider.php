<?php namespace mnshankar\civics;

use Illuminate\Support\ServiceProvider;

class CivicsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'civics');
        //allow customizing the views
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/vendor/civics'),
        ]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //activate the routes
        include __DIR__ . '/routes.php';
        //load the controller file
        $this->app->make('mnshankar\civics\QuestionController');
        //merge our sqlite config into the main db connection
        $this->mergeConfigFrom(
            __DIR__.'/config/database.php', 'database.connections'
        );
    }

}
