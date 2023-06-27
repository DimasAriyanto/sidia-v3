<?php

namespace App\Repositories;

use App\Models\Master\Barang;
use App\Repositories\Contracts\BarangRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BarangRepository implements BarangRepositoryInterface
{
    public function getAll(): Collection
    {
        return Barang::all();
    }

    public function getById(int $id): Barang|null
    {
        return Barang::find($id);
    }

    public function getByName(string $name): Barang|null
    {
        return Barang::where('name', $name)->first();
    }

    public function create(array $data): Barang
    {
        return Barang::create($data);
    }

    public function update(int $id, array $data)
    {
        $barang = $this->getById($id);
        $barang->update($data);

        return $barang;
    }

    public function delete(int $id)
    {
        $barang = $this->getById($id);
        $barang->delete();

        return $barang;
    }
}
