<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Services\Interfaces\AuthInterfaceService::class,
            \App\Services\AuthService::class,
        );

        $this->app->bind(
            \App\Repositories\Interfaces\AuthInterfaceRepository::class,
            \App\Repositories\AuthRepository::class,
        );
        $this->app->bind(
            \App\Services\Interfaces\UserInterfaceService::class,
            \App\Services\UserService::class,
        );

        $this->app->bind(
            \App\Repositories\Interfaces\CategoryInterfaceRepository::class,
            \App\Repositories\CategoryRepository::class
        );
        $this->app->bind(
            \App\Services\Interfaces\CategoryInterfaceService::class,
            \App\Services\CategoryService::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\SupplierInterfaceRepository::class,
            \App\Repositories\SupplierRepository::class
        );
        $this->app->bind(
            \App\Services\Interfaces\SupplierInterfaceService::class,
            \App\Services\SupplierService::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\ProductInterfaceRepository::class,
            \App\Repositories\ProductRepository::class
        );
        $this->app->bind(
            \App\Services\Interfaces\ProductInterfaceService::class,
            \App\Services\ProductService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
