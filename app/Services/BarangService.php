<?php

namespace App\Services;

use App\Models\Master\Barang;
use App\Repositories\Contracts\BarangRepositoryInterface;
use App\Repositories\Contracts\TransaksiRepositoryInterface;
use App\Services\Contracts\BarangServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BarangService implements BarangServiceInterface
{
    protected BarangRepositoryInterface $barangRepository;

    protected TransaksiRepositoryInterface $transaksiRepository;

    public function __construct(
        BarangRepositoryInterface $barangRepository,
        TransaksiRepositoryInterface $transaksiRepository
    ) {
        $this->barangRepository = $barangRepository;
        $this->transaksiRepository = $transaksiRepository;
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

    public function getHistoryTransaksiBuilder(int $id): Builder
    {
        $barang = $this->getById($id);

        return $this->transaksiRepository->getBarangHistoryTransaksi($barang);
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
