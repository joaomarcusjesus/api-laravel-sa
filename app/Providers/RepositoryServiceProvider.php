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
        $this->app->bind(\SA\Repositories\InadimplenteRepository::class, \SA\Repositories\InadimplenteRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\AreaComumRepository::class, \SA\Repositories\AreaComumRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\AreaPaiRepository::class, \SA\Repositories\AreaPaiRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\TipoAreaRepository::class, \SA\Repositories\TipoAreaRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\SegUsersRepository::class, \SA\Repositories\SegUsersRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\SegUsersGroupsRepository::class, \SA\Repositories\SegUsersGroupsRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\SegGroupsRepository::class, \SA\Repositories\SegGroupsRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\SegLogRepository::class, \SA\Repositories\SegLogRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\SegAppsRepository::class, \SA\Repositories\SegAppsRepositoryEloquent::class);
        $this->app->bind(\SA\Repositories\SegGroupsAppsRepository::class, \SA\Repositories\SegGroupsAppsRepositoryEloquent::class);
        //:end-bindings:
    }
}
