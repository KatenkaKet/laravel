<?php

namespace App\Providers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Pagination\Paginator;
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
        Paginator::defaultView('pagination::default');
        Gate::define('destroy-room', function (User $user, Room $room){
            return $user->is_admin OR $room->price < 2000;
        });
    }
}



