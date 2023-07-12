<?php

namespace App\Http\Controllers\Transaksi;

use App\DataTables\TransaksiPenjualanDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transaksi\StorePenjualanRequest;
use App\Services\Contracts\BarangServiceInterface;
use App\Services\Contracts\PenjualanServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PenjualanController extends Controller
{
    protected PenjualanServiceInterface $penjualanService;

    protected BarangServiceInterface $barangService;

    public function __construct(
        PenjualanServiceInterface $penjualanService,
        BarangServiceInterface $barangService,
    ) {
        $this->penjualanService = $penjualanService;
        $this->barangService = $barangService;
    }

    public function index(TransaksiPenjualanDataTable $dataTable)
    {
        return $dataTable->render('transaksi.penjualan.index');
    }

    public function show(int $id)
    {
        try {
            $penjualan = $this->penjualanService->getById($id);

            return view('transaksi.penjualan.show', compact('penjualan'));
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.transaksi.penjualan.index')
                ->withErrors([
                    'error' => $e->getMessage(),
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

        return view('transaksi.penjualan.create', compact('barangData'));
    }

    public function store(StorePenjualanRequest $request)
    {
        try {
            $data = $request->validated();

            if (! $this->penjualanService->checkStockIsAvailable($data['barang_id'], $data['jumlah'])) {
                return redirect()
                    ->back()
                    ->withErrors([
                        'jumlah' => ['Jumlah penjualan melebihi kapasitas stok !'],
                    ]);
            }

            $this->penjualanService->create($data);

            return redirect()
                ->back()
                ->with('success', 'Transaksi penjualan berhasil ditambahkan');
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.transaksi.penjualan.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {

            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menambahkan transaksi penjualan',
                ]);
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->penjualanService->delete($id);

            return redirect()
                ->back()
                ->with('success', 'Transaksi penjualan berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('dashboard.transaksi.penjualan.index')
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menghapus transaksi penjualan.',
                ]);
        }
    }
}
