<?php

namespace App\View\Components\Dashboard;

use App\Services\BreadcrumbItemService;
use App\Services\Contracts\BreadcrumbServiceInterface;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public array $breadcrumb = [];

    /**
     * Create a new component instance.
     */
    public function __construct(BreadcrumbServiceInterface $breadcrumbService)
    {

        $breadcrumbService->register(
            'dashboard.index',
            BreadcrumbItemService::make()
                ->addName('Dashboard')
                ->addIcon('fa-solid fa-home')
                ->addRoute('dashboard.index')
        );

        $breadcrumbItemMaster = BreadcrumbItemService::make()
            ->addName('Master')
            ->addIcon('fa-solid fa-layer-group');

        // Master User
        $breadcrumbService
            ->registerUsing('dashboard.master.user.index', 'dashboard.index')
            ->register('dashboard.master.user.index', $breadcrumbItemMaster)
            ->register(
                'dashboard.master.user.index',
                BreadcrumbItemService::make()
                    ->addName('User')
                    ->addRoute('dashboard.master.user.index')
            )
            ->registerUsing('dashboard.master.user.create', 'dashboard.master.user.index')
            ->register(
                'dashboard.master.user.create',
                BreadcrumbItemService::make()
                    ->addName('Create User')
                    ->addRoute('dashboard.master.user.create')
            )
            ->registerUsing('dashboard.master.user.show', 'dashboard.master.user.index')
            ->register(
                'dashboard.master.user.show',
                BreadcrumbItemService::make()
                    ->addName('Detail User')
                    ->addRouteWithParameters('dashboard.master.user.show')
            )
            ->registerUsing('dashboard.master.user.edit', 'dashboard.master.user.index')
            ->register(
                'dashboard.master.user.edit',
                BreadcrumbItemService::make()
                    ->addName('Edit User')
                    ->addRouteWithParameters('dashboard.master.user.edit')
            );

        // Master Barang
        $breadcrumbService
            ->registerUsing('dashboard.master.barang.index', 'dashboard.index')
            ->register('dashboard.master.barang.index', $breadcrumbItemMaster)
            ->register(
                'dashboard.master.barang.index',
                BreadcrumbItemService::make()
                    ->addName('Barang')
                    ->addRoute('dashboard.master.barang.index')
            )
            ->registerUsing('dashboard.master.barang.show', 'dashboard.master.barang.index')
            ->register(
                'dashboard.master.barang.show',
                BreadcrumbItemService::make()
                    ->addName('Detail Barang')
                    ->addRouteWithParameters('dashboard.master.barang.show')
            )
            ->registerUsing('dashboard.master.barang.create', 'dashboard.master.barang.index')
            ->register(
                'dashboard.master.barang.create',
                BreadcrumbItemService::make()
                    ->addName('Create Barang')
                    ->addRoute('dashboard.master.barang.create')
            )
            ->registerUsing('dashboard.master.barang.edit', 'dashboard.master.barang.index')
            ->register(
                'dashboard.master.barang.edit',
                BreadcrumbItemService::make()
                    ->addName('Edit Barang')
                    ->addRouteWithParameters('dashboard.master.barang.edit')
            );

        // Master Supplier
        $breadcrumbService
            ->registerUsing('dashboard.master.supplier.index', 'dashboard.index')
            ->register('dashboard.master.supplier.index', $breadcrumbItemMaster)
            ->register(
                'dashboard.master.supplier.index',
                BreadcrumbItemService::make()
                    ->addName('Supplier')
                    ->addRoute('dashboard.master.supplier.index')
            )
            ->registerUsing('dashboard.master.supplier.show', 'dashboard.master.supplier.index')
            ->register(
                'dashboard.master.supplier.show',
                BreadcrumbItemService::make()
                    ->addName('Detail Supplier')
                    ->addRouteWithParameters('dashboard.master.supplier.show')
            )
            ->registerUsing('dashboard.master.supplier.create', 'dashboard.master.supplier.index')
            ->register(
                'dashboard.master.supplier.create',
                BreadcrumbItemService::make()
                    ->addName('Create Supplier')
                    ->addRoute('dashboard.master.supplier.create')
            )
            ->registerUsing('dashboard.master.supplier.edit', 'dashboard.master.supplier.index')
            ->register(
                'dashboard.master.supplier.edit',
                BreadcrumbItemService::make()
                    ->addName('Edit Supplier')
                    ->addRouteWithParameters('dashboard.master.supplier.edit')
            );

        $breadcrumbItemTransaksi = BreadcrumbItemService::make()
            ->addName('Transaksi')
            ->addIcon('fa-solid fa-table');

        // Transaksi Pembelian
        $breadcrumbService
            ->registerUsing('dashboard.transaksi.pembelian.index', 'dashboard.index')
            ->register('dashboard.transaksi.pembelian.index', $breadcrumbItemTransaksi)
            ->register(
                'dashboard.transaksi.pembelian.index',
                BreadcrumbItemService::make()
                    ->addName('Pembelian')
                    ->addRoute('dashboard.transaksi.pembelian.index')
            )
            ->registerUsing('dashboard.transaksi.pembelian.show', 'dashboard.transaksi.pembelian.index')
            ->register(
                'dashboard.transaksi.pembelian.show',
                BreadcrumbItemService::make()
                    ->addName('Detail Transaksi Pembelian')
                    ->addRouteWithParameters('dashboard.transaksi.pembelian.show')
            )
            ->registerUsing('dashboard.transaksi.pembelian.create', 'dashboard.transaksi.pembelian.index')
            ->register(
                'dashboard.transaksi.pembelian.create',
                BreadcrumbItemService::make()
                    ->addName('Input Transaksi Pembelian')
                    ->addRoute('dashboard.transaksi.pembelian.create')
            );

        // Transaksi Penjualan
        $breadcrumbService
            ->registerUsing('dashboard.transaksi.penjualan.index', 'dashboard.index')
            ->register('dashboard.transaksi.penjualan.index', $breadcrumbItemTransaksi)
            ->register('dashboard.transaksi.penjualan.index',
                BreadcrumbItemService::make()
                    ->addName('Penjualan')
                    ->addRoute('dashboard.transaksi.penjualan.index')
            )
            ->registerUsing('dashboard.transaksi.penjualan.show', 'dashboard.transaksi.penjualan.index')
            ->register('dashboard.transaksi.penjualan.show',
                BreadcrumbItemService::make()
                    ->addName('Detail Transaksi Penjualan')
                    ->addRouteWithParameters('dashboard.transaksi.penjualan.show')
            )
            ->registerUsing('dashboard.transaksi.penjualan.create', 'dashboard.transaksi.penjualan.index')
            ->register('dashboard.transaksi.penjualan.create',
                BreadcrumbItemService::make()
                    ->addName('Input Transaksi Penjualan')
                    ->addRoute('dashboard.transaksi.penjualan.create')
            );

        // Rekap barang
        $breadcrumbService
            ->registerUsing('dashboard.rekap.barang', 'dashboard.index')
            ->register('dashboard.rekap.barang',
                BreadcrumbItemService::make()
                    ->addName('Rekap')
                    ->addIcon('fa-solid fa-file-lines')
            )
            ->register('dashboard.rekap.barang',
                BreadcrumbItemService::make()
                    ->addName('Rekap Barang')
                    ->addRoute('dashboard.rekap.barang')
            );

        $this->breadcrumb = $breadcrumbService->resolve();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.breadcrumb');
    }
}
