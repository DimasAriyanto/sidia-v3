<?php

namespace App\Repositories\Contracts;

use App\Models\Transaksi\Transaksi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface TransaksiRepositoryInterface
{
    public function getAllByJenisTransaksi(string $jenisTransaksi): Collection;

    public function getById(int $id): ?Transaksi;

    public function create(array $data): Transaksi;

    public function update(Transaksi $transaksi, array $data): bool;

    public function delete(Transaksi $transaksi): bool;

    public function getTotalTransaction(): Builder;

    public function getMonthlyTransaction(): Builder;
}
