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
        $breadcrumbService->registerUsing('dashboard.master.user.index', 'dashboard.index');
        $breadcrumbService->register('dashboard.master.user.index', $breadcrumbItemMaster);
        $breadcrumbService->register(
            'dashboard.master.user.index',
            BreadcrumbItemService::make()
                ->addName('User')
                ->addRoute('dashboard.master.user.index')
        );

        $breadcrumbService->registerUsing('dashboard.master.user.show', 'dashboard.master.user.index');
        $breadcrumbService->register(
            'dashboard.master.user.show',
            BreadcrumbItemService::make()
                ->addName('Detail User')
                ->addRouteWithParameters('dashboard.master.user.show')
        );

        $breadcrumbService->registerUsing('dashboard.master.user.edit', 'dashboard.master.user.index');
        $breadcrumbService->register(
            'dashboard.master.user.edit',
            BreadcrumbItemService::make()
                ->addName('Edit User')
                ->addRouteWithParameters('dashboard.master.user.edit')
        );

        // Master Barang
        $breadcrumbService->registerUsing('dashboard.master.barang.index', 'dashboard.index');
        $breadcrumbService->register('dashboard.master.barang.index', $breadcrumbItemMaster);
        $breadcrumbService->register(
            'dashboard.master.barang.index',
            BreadcrumbItemService::make()
                ->addName('Barang')
                ->addRoute('dashboard.master.barang.index')
        );

        $breadcrumbService->registerUsing('dashboard.master.barang.show', 'dashboard.master.barang.index');
        $breadcrumbService->register(
            'dashboard.master.barang.show',
            BreadcrumbItemService::make()
                ->addName('Detail Barang')
                ->addRouteWithParameters('dashboard.master.barang.show')
        );

        $breadcrumbService->registerUsing('dashboard.master.barang.edit', 'dashboard.master.barang.index');
        $breadcrumbService->register(
            'dashboard.master.barang.edit',
            BreadcrumbItemService::make()
                ->addName('Edit Barang')
                ->addRouteWithParameters('dashboard.master.barang.edit')
        );

        // Master Supplier
        $breadcrumbService->registerUsing('dashboard.master.supplier.index', 'dashboard.index');
        $breadcrumbService->register('dashboard.master.supplier.index', $breadcrumbItemMaster);
        $breadcrumbService->register(
            'dashboard.master.supplier.index',
            BreadcrumbItemService::make()
                ->addName('Supplier')
                ->addRoute('dashboard.master.supplier.index')
        );

        $breadcrumbService->registerUsing('dashboard.master.supplier.show', 'dashboard.master.supplier.index');
        $breadcrumbService->register(
            'dashboard.master.supplier.show',
            BreadcrumbItemService::make()
                ->addName('Detail Supplier')
                ->addRouteWithParameters('dashboard.master.supplier.show')
        );

        $breadcrumbService->registerUsing('dashboard.master.supplier.edit', 'dashboard.master.supplier.index');
        $breadcrumbService->register(
            'dashboard.master.supplier.edit',
            BreadcrumbItemService::make()
                ->addName('Edit Supplier')
                ->addRouteWithParameters('dashboard.master.supplier.edit')
        );

        $breadcrumbItemTransaksi = BreadcrumbItemService::make()
            ->addName('Transaksi')
            ->addIcon('fa-solid fa-table');

        // Transaksi Pembelian
        $breadcrumbService->registerUsing('dashboard.transaksi.pembelian.index', 'dashboard.index');
        $breadcrumbService->register('dashboard.transaksi.pembelian.index', $breadcrumbItemTransaksi);
        $breadcrumbService->register(
            'dashboard.transaksi.pembelian.index',
            BreadcrumbItemService::make()
                ->addName('Pembelian')
                ->addRoute('dashboard.transaksi.pembelian.index')
        );
        $breadcrumbService->registerUsing('dashboard.transaksi.pembelian.show', 'dashboard.transaksi.pembelian.index');
        $breadcrumbService->register(
            'dashboard.transaksi.pembelian.show',
            BreadcrumbItemService::make()
                ->addName('Detail Transaksi Pembelian')
                ->addRouteWithParameters('dashboard.transaksi.pembelian.show')
        );

        // Transaksi Penjualan
        $breadcrumbService->registerUsing('dashboard.transaksi.penjualan.index', 'dashboard.index');
        $breadcrumbService->register('dashboard.transaksi.penjualan.index', $breadcrumbItemTransaksi);
        $breadcrumbService->register(
            'dashboard.transaksi.penjualan.index',
            BreadcrumbItemService::make()
                ->addName('Penjualan')
                ->addRoute('dashboard.transaksi.penjualan.index')
        );

        $breadcrumbService->registerUsing('dashboard.transaksi.penjualan.show', 'dashboard.transaksi.penjualan.index');
        $breadcrumbService->register(
            'dashboard.transaksi.penjualan.show',
            BreadcrumbItemService::make()
                ->addName('Detail Transaksi Penjualan')
                ->addRouteWithParameters('dashboard.transaksi.penjualan.show')
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
