<?php

namespace SA\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\SA\Repositories\CategoryRepository::class, \SA\Repositories\CategoryRepositoryEloquent::class);
        //:end-bindings:
    }
}
