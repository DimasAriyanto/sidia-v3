<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface TransaksiServiceInterface
{
    public function getMonthlyTransaction(): Collection;
}
