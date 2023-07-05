<?php

namespace App\Services;

use App\Models\Transaksi\Transaksi;
use App\Repositories\Contracts\TransaksiRepositoryInterface;
use App\Services\Contracts\PembelianServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class PembelianService implements PembelianServiceInterface
{
    protected TransaksiRepositoryInterface $transaksiRepository;

    protected string $jenisTransaksi = 'pembelian';

    public function __construct(TransaksiRepositoryInterface $transaksiRepository)
    {
        $this->transaksiRepository = $transaksiRepository;
    }

    public function getAll(): Collection
    {
        return $this->transaksiRepository->getAllByJenisTransaksi($this->jenisTransaksi);
    }

    public function getById(int $id): Transaksi
    {
        $pembelian = $this->transaksiRepository->getById($id);
        if (! $pembelian) {
            throw new ModelNotFoundException('Transaksi pembelian dengan id '.$id.' tidak ditemukan');
        }

        return $pembelian;
    }

    public function create(array $data): Transaksi
    {
        $data['jenis_transaksi'] = $this->jenisTransaksi;
        $data['user_id'] = Auth::id();

        return $this->transaksiRepository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $transaksi = $this->getById($id);

        return $this->transaksiRepository->update($transaksi, $data);
    }

    public function delete(int $id): bool
    {
        $transaksi = $this->getById($id);

        return $this->transaksiRepository->delete($transaksi);
    }

    public function getJenisTransaksi(): string
    {
        return $this->jenisTransaksi;
    }
}
