<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\BarangController;
use App\Http\Controllers\Master\SupplierController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Transaksi\PembelianController;
use App\Http\Controllers\Transaksi\PenjualanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.show-login-form');
Route::post('/login', [LoginController::class, 'postLogin'])->name('auth.post-login');
Route::post('/logout', [LoginController::class, 'postLogout'])->name('auth.post-logout');

Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::prefix('/master')->name('master.')->group(function () {
        Route::prefix('/user')->name('user.')->group(function () {
            // View response routes
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::get('/{id}/show', [UserController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');

            // Action routes
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::put('/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('/barang')->name('barang.')->group(function () {
            // View response routes
            Route::get('/', [BarangController::class, 'index'])->name('index');
            Route::get('/create', [BarangController::class, 'create'])->name('create');
            Route::get('/{id}/show', [BarangController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('edit');

            // Action routes
            Route::post('/', [BarangController::class, 'store'])->name('store');
            Route::put('/{id}', [BarangController::class, 'update'])->name('update');
            Route::delete('/{id}', [BarangController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('/supplier')->name('supplier.')->group(function () {
            // View response routes
            Route::get('/', [SupplierController::class, 'index'])->name('index');
            Route::get('/create', [SupplierController::class, 'create'])->name('create');
            Route::get('/{id}/show', [SupplierController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('edit');

            // Action routes
            Route::post('/', [SupplierController::class, 'store'])->name('store');
            Route::put('/{id}', [SupplierController::class, 'update'])->name('update');
            Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('/transaksi')->name('transaksi.')->group(function () {
        Route::prefix('/pemasukan')->name('pemasukan.')->group(function () {
            // View response routes
            Route::get('/', [PembelianController::class, 'index'])->name('index');
        Route::get('/create', [PembelianController::class, 'create'])->name('create');
            Route::get('/{id}/show', [PembelianController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [PembelianController::class, 'edit'])->name('edit');

            // Action routes
            Route::post('/', [PembelianController::class, 'store'])->name('store');
            Route::put('/{id}', [PembelianController::class, 'update'])->name('update');
            Route::delete('/{id}', [PembelianController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('/pengeluaran')->name('pengeluaran.')->group(function () {
            // View response routes
            Route::get('/', [PenjualanController::class, 'index'])->name('index');
            Route::get('/create', [PenjualanController::class, 'create'])->name('create');
            Route::get('/{id}/show', [PenjualanController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [PenjualanController::class, 'edit'])->name('edit');

            // Action routes
            Route::post('/', [PenjualanController::class, 'store'])->name('store');
            Route::put('/{id}', [PenjualanController::class, 'update'])->name('update');
            Route::delete('/{id}', [PenjualanController::class, 'destroy'])->name('destroy');
        });
    });
});
