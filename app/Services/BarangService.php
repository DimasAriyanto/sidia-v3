<?php

namespace App\Services;

use App\Models\Master\Barang;
use App\Repositories\Contracts\BarangRepositoryInterface;
use App\Services\Contracts\BarangServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class BarangService implements BarangServiceInterface
{
    protected $barangRepository;

    public function __construct(BarangRepositoryInterface $barangRepository)
    {
        $this->barangRepository = $barangRepository;
    }

    public function getAll(): Collection
    {
        return $this->barangRepository->getAll();
    }

    public function getById(int $id): Barang|null
    {
        return $this->barangRepository->getById($id);
    }

    public function getByName(string $name): Barang|null
    {
        return $this->barangRepository->getByName($name);
    }

    public function create(array $data): Barang
    {
        return $this->barangRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->barangRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->barangRepository->delete($id);
    }
}
