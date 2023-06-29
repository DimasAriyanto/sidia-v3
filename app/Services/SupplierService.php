<?php

namespace App\Services;

use App\Models\Master\Supplier;
use App\Repositories\Contracts\SupplierRepositoryInterface;
use App\Services\Contracts\SupplierServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SupplierService implements SupplierServiceInterface
{
    protected $supplierReposittory;

    public function __construct(SupplierRepositoryInterface $supplierReposittory)
    {
        $this->supplierReposittory = $supplierReposittory;
    }

    public function getAll(): Collection
    {
        return $this->supplierReposittory->getAll();
    }

    public function getById(int $id): Supplier
    {
        $supplier = $this->supplierReposittory->getById($id);
        if (!$supplier) {
            throw new ModelNotFoundException('Supplier dengan id '.$id.' tidak ditemukan');
        }

        return $supplier;
    }

    public function getByName(string $name): Supplier
    {
        $supplier = $this->supplierReposittory->getByName($name);;
        if (! $supplier) {
            throw new ModelNotFoundException('Supplier dengan nama '.$name.' tidak ditemukan');
        }

        return $supplier;
    }

    public function create(array $data): Supplier
    {
        return $this->supplierReposittory->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->supplierReposittory->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->supplierReposittory->delete($id);
    }
}
