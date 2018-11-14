<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
use App\Logo;
use Cart;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
        View::composer('frontEnd.includes.menu', function($view) {
            $publishedCategories = Category::where('publicationStatus', 0)->get();
            $cartContents = Cart::content();
            $logo = Logo::where('id', 1)->first();
            $view->with('categories', $publishedCategories)
                    ->with('logo', $logo)
                    ->with('cartItems', $cartContents);
        });

        $publishedCategories = Category::where('publicationStatus', 0)->get();
//        $cartContents = Cart::content();
        $logo = Logo::where('id', 1)->first();
        View::share('categories', $publishedCategories);
        View::share('logo', $logo);
//        View::share('cartItems', $cartContents);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
