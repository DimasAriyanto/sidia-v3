<?php

namespace App\Services\Contracts;

use App\Models\Master\Supplier;
use Illuminate\Database\Eloquent\Collection;

interface SupplierServiceInterface
{
    public function getAll(): Collection;

    public function getById(int $id): Supplier;

    public function getByName(string $name): Supplier;

    public function create(array $data): Supplier;

    public function update(int $id, array $data);

    public function delete(int $id);
}
