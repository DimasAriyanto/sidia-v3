<?php

namespace App\DataTables;

use App\Models\Transaksi\Transaksi;
use App\Services\Contracts\PenjualanServiceInterface;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TransaksiPenjualanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function (Transaksi $transaksi) {
                $detailHref = route('dashboard.transaksi.penjualan.show', ['id' => $transaksi->id]);
                $editHref = route('dashboard.transaksi.penjualan.edit', ['id' => $transaksi->id]);
                $deleteAction = route('dashboard.transaksi.penjualan.destroy', ['id' => $transaksi->id]);
                $methodDelete = method_field('delete');
                $csrf = csrf_field();

                return <<<EOL
              <a href="$detailHref" class="btn btn-sm btn-info text-white">
                <i class="fa-solid fa-circle-info"></i>
                Detail
              </a>
              <a href="$editHref" class="btn btn-sm btn-warning text-white">
                <i class="fa-solid fa-pen-to-square"></i>
                Edit
              </a>
              <form action="$deleteAction" method="post" class="d-inline">
                $csrf
                $methodDelete
                <button type="submit" class="btn btn-sm btn-danger text-white">
                  <i class="fa-solid fa-trash"></i>
                  Delete
                </button>
              </form>
            EOL;
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Transaksi $model, PenjualanServiceInterface $penjualanService): QueryBuilder
    {
        return $model
            ->with(['user', 'barang'])
            ->where('jenis_transaksi', $penjualanService->getJenisTransaksi());
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('transaksipenjualan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('#')
                ->searchable(false)
                ->orderable(false),
            Column::make('barang.nama')
                ->title('Barang'),
            Column::make('jumlah')
                ->title('Jumlah'),
            Column::make('harga')
                ->title('Harga'),
            Column::make('tanggal_transaksi')
                ->title('Tanggal Transaksi'),
            Column::make('user.nama')
                ->title('Penginput'),
            Column::computed('action')
                ->width('20%')
                ->addClass('text-center')
                ->exportable(false)
                ->printable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TransaksiPenjualan_'.date('YmdHis');
    }
}
