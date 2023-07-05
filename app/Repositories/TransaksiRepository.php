<?php

namespace App\Repositories;

use App\Models\Transaksi\Transaksi;
use App\Repositories\Contracts\TransaksiRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TransaksiRepository implements TransaksiRepositoryInterface
{
    public function getAllByJenisTransaksi($jenisTransaksi): Collection
    {
        return Transaksi::where('jenis', $jenisTransaksi)->get();
    }

    public function getById(int $id): ?Transaksi
    {
        return Transaksi::find($id);
    }

    public function create(array $data): Transaksi
    {
        return Transaksi::create($data);
    }

    public function update(Transaksi $transaksi, array $data): bool
    {
        return $transaksi->update($data);
    }

    public function delete(Transaksi $transaksi): bool
    {
        return $transaksi->delete();
    }
}
