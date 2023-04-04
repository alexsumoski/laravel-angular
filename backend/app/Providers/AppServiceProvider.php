<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
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
        JsonResource::withoutWrapping();

        Gate::define('view', function(User $user, $model) {
            return $user->hasAccess("view_{$model}") || $user->hasAccess("edit{$model}");
        });

        Gate::define('edit', fn (User $user, $model) => $user->hasAccess("edit{$model}"));
    }
}
