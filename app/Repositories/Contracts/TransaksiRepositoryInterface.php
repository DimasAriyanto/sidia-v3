<?php

namespace App\Repositories\Contracts;

use App\Models\Transaksi\Transaksi;
use Illuminate\Database\Eloquent\Collection;

interface TransaksiRepositoryInterface
{
    public function getAllByJenisTransaksi($jenisTransaksi);

    public function getById(int $id): Transaksi|null;

    public function create(array $data): Transaksi;

    public function update(int $id, array $data);

    public function delete(int $id);
}
