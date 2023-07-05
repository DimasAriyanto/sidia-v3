<?php

namespace App\Repositories;

use App\Models\Transaksi\Transaksi;
use App\Repositories\Contracts\TransaksiRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TransaksiRepository implements TransaksiRepositoryInterface
{
    public function getAllByJenisTransaksi($jenisTransaksi): Collection
    {
        return Transaksi::where('jenis_transaksi', $jenisTransaksi)->get();
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

    public function getMonthlyTransaction(string $jenisTransaksi = ''): Collection
    {
        $builder = Transaksi::query();
        $builder->select(
            'jenis_transaksi',
            DB::raw('month(tanggal_transaksi) bulan'),
            DB::raw('sum(harga) harga'),
            DB::raw('sum(jumlah) jumlah'),
        );

        if ($jenisTransaksi !== '') {
            $builder->where('jenis_transaksi', '=', $jenisTransaksi);
        }

        $builder->groupBy('jenis_transaksi', DB::raw('month(tanggal_transaksi)'));
        $builder->orderByRaw('month(tanggal_transaksi)');

        return $builder->get();
    }
}
