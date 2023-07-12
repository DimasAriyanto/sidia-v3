<?php

use App\Http\Controllers\Api\BarangApiController;
use App\Http\Controllers\Api\Master\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth.session')->name('api.')->group(function () {
    Route::name('master.')->prefix('/master')->group(function () {
        Route::get('/user/datatable', [UserApiController::class, 'getBasicDatatable'])->name('user.datatable');
        Route::get('/barang/{barangId}/history_transaksi/datatable', [BarangApiController::class, 'getHistoryTransaksiDataTable'])->name('barang.history_transaksi.datatable');
    });
});
