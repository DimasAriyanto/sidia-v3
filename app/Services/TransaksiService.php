<?php

namespace App\Services;

use App\Models\Transaksi\Transaksi;
use App\Repositories\Contracts\TransaksiRepositoryInterface;
use App\Services\Contracts\TransaksiServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransaksiService implements TransaksiServiceInterface
{
    protected TransaksiRepositoryInterface $repository;

    public function __construct(TransaksiRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllByJenisTransaksi($jenisTransaksi): Collection
    {
        return $this->repository->getAllByJenisTransaksi($jenisTransaksi);
    }

    public function getById(int $id): Transaksi
    {
        $transaksi = $this->repository->getById($id);
        if (! $transaksi) {
            throw new ModelNotFoundException(sprintf('Data transaksi dengan id %s tidak ditemukan', $id));
        }

        return $transaksi;
    }

    public function create(array $data): Transaksi
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $transaksi = $this->getById($id);

        return $this->repository->update($transaksi, $data);
    }

    public function delete(int $id): bool
    {
        $transaksi = $this->getById($id);

        return $this->repository->delete($transaksi);
    }
}
