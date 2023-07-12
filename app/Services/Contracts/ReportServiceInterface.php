<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface ReportServiceInterface
{
    public function getMonthlyTransaction(): Collection;

    public function getTotalTransaction(): Collection;

    public function getRekapBarang(): Collection;
}
