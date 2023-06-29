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
    protected $transaksiRepository;

    public function __construct(TransaksiRepositoryInterface $transaksiRepository)
    {
        $this->transaksiRepository = $transaksiRepository;
    }

    public function getAll(): Collection
    {
        return $this->transaksiRepository->getAllByJenisTransaksi('pembelian');
    }

    public function getById(int $id): Transaksi
    {
        $pembelian = $this->transaksiRepository->getById($id);
        if (!$pembelian) {
            throw new ModelNotFoundException('Transaksi pembelian dengan id '.$id.' tidak ditemukan');
        }

        return $pembelian;
    }

    public function create(array $data): Transaksi
    {
        $data['jenis_transaksi'] = 'pembelian';
        $data['user_id'] = Auth::id();
        return $this->transaksiRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->transaksiRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->transaksiRepository->delete($id);
    }
}
