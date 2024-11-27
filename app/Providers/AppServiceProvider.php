<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        // Gate::policy(\App\Models\User::class, \App\Policies\UserPolicy::class);
        // Gate::policy(\App\Models\Category::class, \App\Policies\CategoryPolicy::class);
        // Gate::policy(\App\Models\Post::class, \App\Policies\PostPolicy::class);
    }
}
