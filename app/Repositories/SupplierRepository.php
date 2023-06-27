<?php

namespace App\Repositories;

use App\Models\Master\Supplier;
use App\Repositories\Contracts\SupplierRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SupplierRepository implements SupplierRepositoryInterface
{
    public function getAll(): Collection
    {
        return Supplier::all();
    }

    public function getById(int $id): Supplier
    {
        return Supplier::findOrFail($id);
    }

    public function getByName(string $name): Supplier
    {
        return Supplier::where('name', $name)->first();
    }

    public function create(array $data): Supplier
    {
        return Supplier::create($data);
    }

    public function update(int $id, array $data)
    {
        $supplier = $this->getById($id);
        $supplier->update($data);
        return $supplier;
    }

    public function delete(int $id)
    {
        $supplier = $this->getById($id);
        $supplier->delete();
        return $supplier;
    }
}
