<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\BarangController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Transaksi\PemasukanController;
use App\Http\Controllers\Transaksi\PengeluaranController;
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
    });

    Route::prefix('/transaksi')->name('transaksi.')->group(function () {
        Route::prefix('/pemasukan')->name('pemasukan.')->group(function () {
            // View response routes
            Route::get('/', [PemasukanController::class, 'index'])->name('index');
            Route::get('/create', [PemasukanController::class, 'create'])->name('create');
            Route::get('/{id}/show', [PemasukanController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [PemasukanController::class, 'edit'])->name('edit');

            // Action routes
            Route::post('/', [PemasukanController::class, 'store'])->name('store');
            Route::put('/{id}', [PemasukanController::class, 'update'])->name('update');
            Route::delete('/{id}', [PemasukanController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('/pengeluaran')->name('pengeluaran.')->group(function () {
            // View response routes
            Route::get('/', [PengeluaranController::class, 'index'])->name('index');
            Route::get('/create', [PengeluaranController::class, 'create'])->name('create');
            Route::get('/{id}/show', [PengeluaranController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [PengeluaranController::class, 'edit'])->name('edit');

            // Action routes
            Route::post('/', [PengeluaranController::class, 'store'])->name('store');
            Route::put('/{id}', [PengeluaranController::class, 'update'])->name('update');
            Route::delete('/{id}', [PengeluaranController::class, 'destroy'])->name('destroy');
        });
    });
});
