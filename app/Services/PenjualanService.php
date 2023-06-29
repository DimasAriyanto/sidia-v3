<?php

namespace App\Services;

use App\Models\Transaksi\Transaksi;
use App\Repositories\Contracts\TransaksiRepositoryInterface;
use App\Services\Contracts\PenjualanServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class PenjualanService implements PenjualanServiceInterface
{
    protected $transaksiRepository;

    public function __construct(TransaksiRepositoryInterface $transaksiRepository)
    {
        $this->transaksiRepository = $transaksiRepository;
    }

    public function getAll(): Collection
    {
        return $this->transaksiRepository->getAllByJenisTransaksi('penjualan');
    }

    public function getById(int $id): Transaksi|null
    {
        return $this->transaksiRepository->getById($id);
    }

    public function create(array $data): Transaksi
    {
        $data['jenis_transaksi'] = 'penjualan';
        $data['supplier_id'] = null;
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
