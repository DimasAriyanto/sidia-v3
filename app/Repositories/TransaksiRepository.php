<?php

namespace App\Repositories;

use App\Models\Transaksi\Transaksi;
use App\Repositories\Contracts\TransaksiRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TransaksiRepository implements TransaksiRepositoryInterface
{
    public function getAllByJenisTransaksi($jenisTransaksi)
    {
        return Transaksi::where('jenis_transaksi', $jenisTransaksi)->get();
    }

    public function getById(int $id): Transaksi|null
    {
        return Transaksi::find($id);
    }

    public function create(array $data): Transaksi
    {
        return Transaksi::create($data);
    }

    public function update(int $id, array $data)
    {
        $transaksi = $this->getById($id);
        $transaksi->update($data);
        return $transaksi;
    }

    public function delete(int $id)
    {
        $transaksi = $this->getById($id);
        $transaksi->delete();
        return $transaksi;
    }
}
