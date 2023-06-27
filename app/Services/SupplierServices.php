<?php

namespace App\Services;

use App\Models\Master\Supplier;
use App\Repositories\Contracts\SupplierRepositoryInterface;
use App\Services\Contracts\SupplierServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class SupplierServices implements SupplierServiceInterface
{
    protected $supplierReposittory;

    public function __construct(SupplierRepositoryInterface $supplierReposittory) {
        $this->supplierReposittory = $supplierReposittory;
    }

    public function getAll(): Collection
    {
        return $this->supplierReposittory->getAll();
    }

    public function getById(int $id): Supplier
    {
        return $this->supplierReposittory->getById($id);
    }

    public function getByName(string $name): Supplier
    {
        return $this->supplierReposittory->getByName($name);
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
