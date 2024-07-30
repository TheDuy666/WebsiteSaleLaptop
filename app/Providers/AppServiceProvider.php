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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('header-customer.blade', function ($view) {
            $user = auth()->user();
            $cartCount = $user->cart->cartDetails()->count();
            $view->with('cartCount', $cartCount);
        });
    }
}
