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
                'link' => '<a href="'.route('dashboard.master.barang.index').'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Barang</a>',
            ],
            [
                'count' => $userService->getAll()->count(),
                'name' => 'Total User',
                'icon' => '<i class="fa-solid fa-user fs-1"></i>',
                'link' => '<a href="'.route('dashboard.master.user.index').'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">User</a>',
            ],
            [
                'count' => $supplierService->getAll()->count(),
                'name' => 'Total Supplier',
                'icon' => '<i class="fa-solid fa-parachute-box fs-1"></i>',
                'link' => '<a href="'.route('dashboard.master.supplier.index').'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Supplier</a>',
            ],
            [
                'count' => $pembelianService->getAll()->count(),
                'name' => 'Total Pembelian',
                'icon' => '<i class="fa-solid fa-cart-shopping fs-1"></i>',
                'link' => '<a href="'.route('dashboard.transaksi.pembelian.index').'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Pembelian</a>',
            ],
            [
                'count' => $penjualanService->getAll()->count(),
                'name' => 'Total Penjualan',
                'icon' => '<i class="fa-solid fa-store fs-1"></i>',
                'link' => '<a href="'.route('dashboard.transaksi.penjualan.index').'" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Penjualan</a>',
            ],
        ];

        $labels = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];

        $pembelianMonthlyTransaction = $pembelianService->getMonthlyTransaction();
        $penjualanMonthlyTransaction = $penjualanService->getMonthlyTransaction();

        $lineChartData = [
            'pembelian' => [
                'harga' => $pembelianMonthlyTransaction->pluck('harga')->toArray(),
                'jumlah' => $pembelianMonthlyTransaction->pluck('jumlah')->toArray(),
            ],
            'penjualan' => [
                'harga' => $penjualanMonthlyTransaction->pluck('harga')->toArray(),
                'jumlah' => $penjualanMonthlyTransaction->pluck('jumlah')->toArray(),
            ],
        ];

        $pembelianTotalTranasction = $pembelianService->getTotalTransaction();
        $penjualanTotalTransaction = $penjualanService->getTotalTransaction();

        $doughnutChartData = [
            'pembelian' => [
                'total' => $pembelianTotalTranasction,
            ],
            'penjualan' => [
                'total' => $penjualanTotalTransaction,
            ],
        ];

        return view('dashboard.index', compact('countData', 'labels', 'lineChartData', 'doughnutChartData'));
    }
}
