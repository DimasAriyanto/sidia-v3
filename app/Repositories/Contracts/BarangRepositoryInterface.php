<?php

namespace App\Repositories;

use App\Models\Master\Barang;
use Illuminate\Database\Eloquent\Collection;

interface BarangRepositoryInterface
{
    public function create(array $data): Barang;

    public function getAll(): Collection;

    public function getById($id): Barang;

    public function update($id, array $data): bool;

    public function delete($id): bool;
}
