<?php

namespace App\Services\Contracts;

use App\Models\Transaksi\Transaksi;
use Illuminate\Database\Eloquent\Collection;

interface PenjualanServiceInterface
{
    public function getAll(): Collection;

    public function getById(int $id): Transaksi;

    public function create(array $data): Transaksi;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function getJenisTransaksi(): string;

    public function getMonthlyTransaction(): Collection;

    public function getTotalTransaction(): Transaksi;
}
