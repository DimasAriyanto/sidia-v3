<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $menu;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menu = [
            [
                'name' => 'Dashboard',
                'icon' => 'fa-solid fa-home',
                'route' => route('dashboard.index'),
            ],
            [
                'name' => 'Master',
                'icon' => 'fa-solid fa-layer-group',
                'route' => '#',
                'child' => [
                    [
                        'name' => 'Pengguna',
                        'route' => route('dashboard.master.user.index'),
                    ],
                    [
                        'name' => 'Barang',
                        'route' => route('dashboard.master.barang.index'),
                    ],
                    [
                        'name' => 'Supplier',
                        'route' => route('dashboard.master.supplier.index'),
                    ],
                ],
            ],
            [
                'name' => 'Transaksi',
                'icon' => 'fa-solid fa-table',
                'route' => '#',
                'child' => [
                    [
                        'name' => 'Pembelian',
                        'route' => route('dashboard.transaksi.pembelian.index'),
                    ],
                    [
                        'name' => 'Penjualan',
                        'route' => route('dashboard.transaksi.penjualan.index'),
                    ],
                ],
            ],
            [
                'name' => 'Rekap',
                'icon' => 'fa-solid fa-file-lines',
                'route' => '#',
                'child' => [
                    [
                        'name' => 'Barang',
                        'route' => route('dashboard.rekap.barang'),
                    ],
                ],
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.sidebar');
    }
}
