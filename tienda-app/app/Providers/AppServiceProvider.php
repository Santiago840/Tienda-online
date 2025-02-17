<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Vite;
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
        //crear iteración para cada gate
        Gate::define('updateUsuario', [UserPolicy::class, 'update']);
        Gate::define('deleteUsuario', [UserPolicy::class, 'delete']);

        Vite::prefetch(concurrency: 3);
    }
}
