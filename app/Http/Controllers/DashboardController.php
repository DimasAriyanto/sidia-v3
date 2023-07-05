<?php

namespace App\Http\Controllers;

use App\Services\Contracts\BarangServiceInterface;
use App\Services\Contracts\PembelianServiceInterface;
use App\Services\Contracts\PenjualanServiceInterface;
use App\Services\Contracts\SupplierServiceInterface;
use App\Services\Contracts\UserServiceInterface;

class DashboardController extends Controller
{
    public function index(
        BarangServiceInterface $barangService,
        UserServiceInterface $userService,
        SupplierServiceInterface $supplierService,
        PembelianServiceInterface $pembelianService,
        PenjualanServiceInterface $penjualanService
    ) {
        $countData = [
            [
                'count' => $barangService->getAll()->count(),
                'name' => 'Total Barang',
                'icon' => '<i class="fa-solid fa-briefcase fs-1"></i>',
            ],
            [
                'count' => $userService->getAll()->count(),
                'name' => 'Total User',
                'icon' => '<i class="fa-solid fa-user fs-1"></i>',
            ],
            [
                'count' => $supplierService->getAll()->count(),
                'name' => 'Total Supplier',
                'icon' => '<i class="fa-solid fa-parachute-box fs-1"></i>',
            ],
            [
                'count' => $pembelianService->getAll()->count(),
                'name' => 'Total Pembelian',
                'icon' => '<i class="fa-solid fa-cart-shopping fs-1"></i>',
            ],
            [
                'count' => $penjualanService->getAll()->count(),
                'name' => 'Total Penjualan',
                'icon' => '<i class="fa-solid fa-store fs-1"></i>',
            ],
        ];
        $lineChartData = [

        ];

        return view('dashboard.index', compact('countData'));
    }
}
