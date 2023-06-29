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

        return view('', compact('penjualan'));
    }

    public function show(int $id)
    {
        try {
            $penjualan = $this->penjualanService->getById($id);
            if (! $penjualan) {
                throw new ModelNotFoundException('Transaksi penjualan tidak ditemukan');
            }

            return view('', compact('penjualan'));
        } catch (ModelNotFoundException $e) {
            return back()->withErrors([
                'error' => 'Transaksi penjualan tidak ditemukan.',
            ]);
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Ada masalah saat membuka halaman!',
            ]);
        }
    }

    public function create()
    {
        return view('');
    }

    public function edit(int $id)
    {
        $penjualan = $this->penjualanService->getById($id);

        return view('', compact('penjualan'));
    }

    public function store(StorePenjualanRequest $request)
    {
        try {
            $data = $request->validated();
            $penjualan = $this->penjualanService->create($data);

            return redirect()
                ->back()
                ->with('success', 'Transaksi penjualan berhasil ditambahkan');
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
            $penjualan = $this->penjualanService->update($id, $data);

            return redirect()
                ->back()
                ->with('success', 'Transaksi penjualan berhasil diubah');
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
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal menghapus transaksi penjualan.',
                ]);
        }
    }
}
