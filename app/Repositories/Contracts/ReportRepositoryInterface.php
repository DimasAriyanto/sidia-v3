<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Query\Builder;

interface ReportRepositoryInterface
{
    public function getRekapBarang(): Builder;
}
