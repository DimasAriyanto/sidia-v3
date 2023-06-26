<?php

namespace App\Providers;

use App\Repositories\BarangRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\BarangRepository;
use App\Services\BarangService;
use App\Services\Contracts\BarangServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(BarangRepositoryInterface::class, BarangRepository::class);
        $this->app->bind(BarangServiceInterface::class, BarangService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
