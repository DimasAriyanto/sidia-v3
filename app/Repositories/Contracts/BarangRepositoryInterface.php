<?php

namespace App\Repositories;

use App\Models\Master\Barang;
use Illuminate\Database\Eloquent\Collection;

interface BarangRepositoryInterface
{
    public function getAll(): Collection;

    public function getById(int $id): Barang;

    public function getByName(string $name): Barang;

    public function create(array $data): Barang;

    public function update(int $id, array $data);

    public function delete(int $id);
}
