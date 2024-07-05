<?php

namespace App\Providers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
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
        Paginator::useTailwind();

        App::setLocale('id');

        Carbon::setLocale('id');

        Gate::define('superadmin', function (User $user) {
            return $user->role_id === 1;
        });
        Gate::define('admin', function (User $user) {
            return $user->role_id === 2;
        });
        Gate::define('editor', function (User $user) {
            return $user->role_id === 3;
        });
        Gate::define('penulis', function (User $user) {
            return $user->role_id === 4;
        });
    }
}
