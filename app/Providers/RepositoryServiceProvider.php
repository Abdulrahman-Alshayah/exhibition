<?php

namespace App\Providers;

use App\Interfaces\Categories\CategoryRepositoryInterface;
use App\Interfaces\Products\ProductRepositoryInterface;
use App\Interfaces\Users\UserRepositoryInterface;
use App\Repository\Categories\CategoryRepository;
use App\Repository\Products\ProductRepository;
use App\Repository\Users\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
