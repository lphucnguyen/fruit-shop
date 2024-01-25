<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $this->app->bind(
            \App\Services\ServiceInterface::class,
            \App\Services\BaseService::class
        );

        $this->app->bind(
            \App\Services\Contracts\CategoryServiceInterface::class,
            \App\Services\Eloquents\CategoryService::class
        );

        $this->app->bind(
            \App\Services\Contracts\FruitServiceInterface::class,
            \App\Services\Eloquents\FruitService::class
        );

        $this->app->bind(
            \App\Services\Contracts\InvoiceServiceInterface::class,
            \App\Services\Eloquents\InvoiceService::class
        );

        $this->app->bind(
            \App\Services\Contracts\UserServiceInterface::class,
            \App\Services\Eloquents\UserService::class
        );
    }
}
