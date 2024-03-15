<?php

namespace App\Providers;

use App\Interfaces\Products\ProductRepositoryInterface;
use App\Interfaces\Users\UserRepositoryInterface;
use App\Models\Product;
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
