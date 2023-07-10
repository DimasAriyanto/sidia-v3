<?php

namespace App\Http\Controllers\Transaksi;

use App\DataTables\TransaksiPembelianDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transaksi\StorePembelianRequest;
use App\Http\Requests\Transaksi\UpdatePembelianRequest;
use App\Services\Contracts\BarangServiceInterface;
use App\Services\Contracts\PembelianServiceInterface;
use App\Services\Contracts\SupplierServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PembelianController extends Controller
{
    protected $pembelianService;
    protected $barangService;
    protected $supplierService;

    public function __construct(PembelianServiceInterface $pembelianService, BarangServiceInterface $barangService, SupplierServiceInterface $supplierService)
    {
        $this->pembelianService = $pembelianService;
        $this->barangService = $barangService;
        $this->supplierService = $supplierService;
    }

    public function index(TransaksiPembelianDataTable $dataTable)
    {
        return $dataTable->render('transaksi.pembelian.index');
    }

    public function show(int $id)
    {
        try {
            $pembelian = $this->pembelianService->getById($id);

            return view('transaksi.pembelian.show', compact('pembelian'));
        } catch (ModelNotFoundException $e) {
            return back()->withErrors([
                'error' => 'Transaksi pembelian tidak ditemukan.',
            ]);
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Ada masalah saat membuka halaman!',
            ]);
        }
    }

    public function create()
    {
        $barangData = $this->barangService->getAll();
        $supplierData = $this->supplierService->getAll();
        return view('transaksi.pembelian.create', compact('barangData', 'supplierData'));
    }

    public function store(StorePembelianRequest $request)
    {
        try {
            $data = $request->validated();
            $this->pembelianService->create($data);

            return redirect()
                ->back()
                ->with('success', 'Transaksi pembelian berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menambahkan transaksi pembelian',
                ]);
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->pembelianService->delete($id);

            return redirect()
                ->back()
                ->with('success', 'Transaksi pembelian berhasil dihapus');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menghapus transaksi pembelian.',
                ]);
        }
    }
}
