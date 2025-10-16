<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Article;
use App\Observers\ArticleObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
             \App\Models\Article::observe(\App\Observers\ArticleObserver::class);
    }
}
