<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(
            \App\Repositories\RepositoryInterface::class,
            \App\Repositories\BaseRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\CategoryRepositoryInterface::class,
            \App\Repositories\Eloquents\CategoryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\FruitRepositoryInterface::class,
            \App\Repositories\Eloquents\FruitRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\InvoiceRepositoryInterface::class,
            \App\Repositories\Eloquents\InvoiceRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\UserRepositoryInterface::class,
            \App\Repositories\Eloquents\UserRepository::class
        );
    }
}
