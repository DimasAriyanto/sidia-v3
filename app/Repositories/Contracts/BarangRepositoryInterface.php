<?php

namespace App\Repositories\Contracts;

use App\Models\Master\Barang;
use Illuminate\Database\Eloquent\Collection;

interface BarangRepositoryInterface
{
    public function getAll(): Collection;

    public function getById(int $id): Barang|null;

    public function getByName(string $name): Barang|null;

    public function create(array $data): Barang;

    public function update(Barang $barang, array $data);

    public function delete(Barang $barang);
}
