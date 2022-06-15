<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Models\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;


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
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        Paginator::useBootstrap();
        Schema::defaultStringLength(256);
    }
}
