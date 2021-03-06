<?php

namespace ToucanTech\Providers;

use Illuminate\Support\ServiceProvider;
use ToucanTech\Repositories\UserRepository;
use ToucanTech\Repositories\RoleRepository;
use ToucanTech\Repositories\SchoolRepository;
use ToucanTech\Repositories\PhotoRepository;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ReprositoryInterface::class, UserRepository::class);
        $this->app->singleton(ReprositoryInterface::class, RoleRepository::class);
        $this->app->singleton(ReprositoryInterface::class, SchoolRepository::class);
         $this->app->singleton(ReprositoryInterface::class, PhotoRepository::class);
    }
}
