<?php

namespace App\Services;

use App\Models\Master\Barang;
use App\Repositories\Contracts\BarangRepositoryInterface;
use App\Services\Contracts\BarangServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    public function getById(int $id): Barang
    {
        $barang = $this->barangRepository->getById($id);
        if (! $barang) {
            throw new ModelNotFoundException('Barang dengan id '.$id.' tidak ditemukan');
        }

        return $barang;
    }

    public function getByName(string $name): Barang
    {
        $barang = $this->barangRepository->getByName($name);
        if (! $barang) {
            throw new ModelNotFoundException('Barang dengan nama '.$name.' tidak ditemukan');
        }

        return $barang;
    }

    public function create(array $data): Barang
    {
        return $this->barangRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        $barang = $this->getById($id);

        return $this->barangRepository->update($barang, $data);
    }

    public function delete(int $id)
    {
        $barang = $this->getById($id);

        return $this->barangRepository->delete($barang);
    }
}
