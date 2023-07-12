<?php

namespace App\Repositories;

use App\Models\Master\Barang;
use App\Models\Transaksi\Transaksi;
use App\Repositories\Contracts\TransaksiRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
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

    public function getTotalTransaction(): Builder
    {
        $builder = Transaksi::select(
            DB::raw('sum(harga * jumlah) total'),
            DB::raw('sum(harga) harga_total'),
            DB::raw('sum(jumlah) jumlah_total'),
        );
        $builder->groupBy('jenis_transaksi');

        return $builder;
    }

    public function getMonthlyTransaction(): Builder
    {
        $builder = Transaksi::query();
        $builder->select(
            'jenis_transaksi',
            DB::raw('month(tanggal_transaksi) bulan'),
            DB::raw('sum(harga) harga'),
            DB::raw('sum(jumlah) jumlah'),
        );

        $builder->groupBy('jenis_transaksi', DB::raw('month(tanggal_transaksi)'));
        $builder->orderByRaw('month(tanggal_transaksi)');

        return $builder;
    }

    public function getBarangHistoryTransaksi(Barang $barang): Builder
    {
        return Transaksi::where('barang_id', $barang->id)
            ->orderByDesc('tanggal_transaksi');
    }
}
