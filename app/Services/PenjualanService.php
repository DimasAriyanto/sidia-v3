<?php

namespace App\Services;

use App\Models\Transaksi\Transaksi;
use App\Repositories\Contracts\BarangRepositoryInterface;
use App\Repositories\Contracts\TransaksiRepositoryInterface;
use App\Services\Contracts\PenjualanServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class PenjualanService implements PenjualanServiceInterface
{
    protected TransaksiRepositoryInterface $transaksiRepository;

    protected BarangRepositoryInterface $barangRepository;

    protected string $jenisTransaksi = 'penjualan';

    public function __construct(
        TransaksiRepositoryInterface $transaksiRepository,
        BarangRepositoryInterface $barangRepository
    ) {
        $this->transaksiRepository = $transaksiRepository;
        $this->barangRepository = $barangRepository;
    }

    public function getAll(): Collection
    {
        return $this->transaksiRepository->getAllByJenisTransaksi($this->jenisTransaksi);
    }

    public function getById(int $id): Transaksi
    {
        $penjualan = $this->transaksiRepository->getById($id);
        if (! $penjualan) {
            throw new ModelNotFoundException('Transaksi penjualan dengan id '.$id.' tidak ditemukan');
        }

        return $penjualan;
    }

    public function create(array $data): Transaksi
    {
        $data['jenis_transaksi'] = $this->jenisTransaksi;
        $data['supplier_id'] = null;
        $data['user_id'] = Auth::id();
        $data['tanggal_transaksi'] = now();

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

    public function getMonthlyTransaction(): Collection
    {
        $pembelianMonthlyTransaction = $this->transaksiRepository->getMonthlyTransaction();
        $pembelianMonthlyTransaction->where('jenis_transaksi', $this->getJenisTransaksi());

        $pembelianMonthlyTransaction = $pembelianMonthlyTransaction->get();

        $availableMonths = $pembelianMonthlyTransaction->pluck('bulan')->toArray();
        $remainingMonths = array_diff(range(1, 12), $availableMonths);

        foreach ($remainingMonths as $month) {
            $pembelianMonthlyTransaction->push([
                'jenis_transaksi' => $this->getJenisTransaksi(),
                'bulan' => $month,
                'harga' => 0,
                'jumlah' => 0,
            ]);
        }

        $pembelianMonthlyTransaction = $pembelianMonthlyTransaction
            ->sort(function ($a, $b) {
                return $a['bulan'] > $b['bulan'];
            });

        return $pembelianMonthlyTransaction;
    }

    public function getTotalTransaction(): float
    {
        $transaksi = $this->transaksiRepository
            ->getTotalTransaction()
            ->where('jenis_transaksi', '=', $this->getJenisTransaksi())
            ->first();

        if (! $transaksi) {
            return 0;
        }

        return $transaksi->total;
    }

    public function checkStockIsAvailable(int $barangId, int $jumlahJual): bool
    {
        $barang = $this->barangRepository->getById($barangId);

        return $barang->stok >= $jumlahJual;
    }
}
