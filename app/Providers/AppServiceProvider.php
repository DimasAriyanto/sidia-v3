<?php

namespace App\Providers;

use App\Repositories\Contracts\BarangRepositoryInterface;
use App\Repositories\Contracts\SupplierRepositoryInterface;
use App\Repositories\Contracts\TransaksiRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\BarangRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\TransaksiRepository;
use App\Repositories\UserRepository;
use App\Services\Contracts\BarangServiceInterface;
use App\Services\Contracts\PembelianServiceInterface;
use App\Services\Contracts\PenjualanServiceInterface;
use App\Services\Contracts\SupplierServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use App\Services\BarangService;
use App\Services\PembelianService;
use App\Services\PenjualanService;
use App\Services\SupplierService;
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
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
        $this->app->bind(SupplierServiceInterface::class, SupplierService::class);
        $this->app->bind(TransaksiRepositoryInterface::class, TransaksiRepository::class);
        $this->app->bind(PembelianServiceInterface::class, PembelianService::class);
        $this->app->bind(PenjualanServiceInterface::class, PenjualanService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
