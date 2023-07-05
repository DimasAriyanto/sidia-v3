<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaksi\StorePenjualanRequest;
use App\Http\Requests\Transaksi\UpdatePenjualanRequest;
use App\Services\Contracts\PenjualanServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    protected $penjualanService;

    public function __construct(PenjualanServiceInterface $penjualanService)
    {
        $this->penjualanService = $penjualanService;
    }

    public function index()
    {
        $penjualan = $this->penjualanService->getAll();

        return view('transaksi.penjualan.index', compact('penjualan'));
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
        return view('transaksi.penjualan.create');
    }

    public function edit(int $id)
    {
        try {
            $penjualan = $this->penjualanService->getById($id);

            return view('transaksi.penjualan.edit', compact('penjualan'));
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

    public function store(StorePenjualanRequest $request)
    {
        try {
            $data = $request->validated();
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

    public function update(UpdatePenjualanRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $this->penjualanService->update($id, $data);

            return redirect()
                ->back()
                ->with('success', 'Transaksi penjualan berhasil diubah');
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
                    'error' => 'Gagal mengubah transaksi penjualan.',
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
