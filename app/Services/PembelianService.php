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
        $pembelianMonthlyTransaction->where('jenis_transaksi', '=', $this->getJenisTransaksi());
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
}
