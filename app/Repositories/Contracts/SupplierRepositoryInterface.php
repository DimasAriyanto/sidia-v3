<?php

namespace App\Repositories\Contracts;

use App\Models\Master\Supplier;
use Illuminate\Database\Eloquent\Collection;

interface SupplierRepositoryInterface
{
    public function getAll(): Collection;

    public function getById(int $id): Supplier|null;

    public function getByName(string $name): Supplier|null;

    public function create(array $data): Supplier;

    public function update(Supplier $supplier, array $data);

    public function delete(Supplier $supplier);
}
