<?php

namespace App\Providers;
use view;
use App\Models\Cart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        view()->composer('*', function ($view) {
            $count = 0;
    
            if (Auth::check()) {
                $user = Auth::user();
                $user_id = $user->id;
                $count = Cart::where('user_id', $user_id)->count();
            }
    
            $view->with('show_cart', $count);
        });
        Paginator::useBootstrapFour();
        Paginator::useBootstrapFive();
    }
        
}
