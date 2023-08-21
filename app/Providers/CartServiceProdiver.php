<?php

namespace App\Providers;

use App\Services\Cart\CartService;
use Illuminate\Support\ServiceProvider;

class CartServiceProdiver extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CartService::class, function () {
            return new CartService(session());
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // dd(session());
    }
}
