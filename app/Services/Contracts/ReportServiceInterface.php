<?php

namespace App\Services\Contracts;

use Illuminate\Support\Collection;

interface ReportServiceInterface
{
    public function getRekapBarang(): Collection;
}
