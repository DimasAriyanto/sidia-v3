<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface ReportRepositoryInterface
{
    public function getTotalTransaction(): Builder;

    public function getMonthlyTransaction(): Builder;

    public function getRekapBarang(): Builder;
}
