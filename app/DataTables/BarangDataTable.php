<?php

namespace App\DataTables;

use App\Models\Master\Barang;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BarangDataTable extends DataTable
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
            ->addColumn('action', function (Barang $barang) {
                $detailHref = route('dashboard.master.barang.show', ['id' => $barang->id]);
                $editHref = route('dashboard.master.barang.edit', ['id' => $barang->id]);
                $deleteAction = route('dashboard.master.barang.destroy', ['id' => $barang->id]);
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
    public function query(Barang $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('barang-table')
            ->columns($this->getColumns())
            ->addAction()
            ->minifiedAjax()
                    //->dom('Bfrtip')
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
            Column::make('nama')
                ->title('Nama'),
            Column::make('satuan')
                ->title('Satuan'),
            Column::make('stok')
                ->title('stok')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Barang_'.date('YmdHis');
    }
}
