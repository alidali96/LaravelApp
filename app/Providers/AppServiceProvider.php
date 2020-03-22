<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        View::composer('layouts.master', function($view) {
           $view->with('lastPostedArticle', Article::all()->last()->name);
        });
    }
}
