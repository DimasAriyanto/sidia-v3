<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
            ->addColumn('action', function (User $user) {
                $detailHref = route('dashboard.master.user.show', ['id' => $user->id]);
                $editHref = route('dashboard.master.user.edit', ['id' => $user->id]);
                $deleteAction = route('dashboard.master.user.destroy', ['id' => $user->id]);
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
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
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
            Column::make('no_hp')
                ->title('No HP'),
            Column::make('user_type')
                ->title('Type')
                ->render('ucfirst(data)'),
            Column::make('action')
                ->title('Action')
                ->width('20%')
                ->orderable(false)
                ->searchable(false)
                ->exportable(false)
                ->printable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_'.date('YmdHis');
    }
}
