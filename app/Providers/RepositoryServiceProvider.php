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
        $this->app->bind(\SA\Repositories\BillPayRepository::class, \SA\Repositories\BillPayRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\UserRepository::class, \SA\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\ReservaRepository::class, \SA\Repositories\ReservaRepositoryEloquent::class);
        //:end-bindings:
    }
}
