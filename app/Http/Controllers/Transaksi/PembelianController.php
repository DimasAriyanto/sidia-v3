<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaksi\StorePembelianRequest;
use App\Http\Requests\Transaksi\UpdatePembelianRequest;
use App\Services\Contracts\PembelianServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    protected $pembelianService;

    public function __construct(PembelianServiceInterface $pembelianService)
    {
        $this->pembelianService = $pembelianService;
    }

    public function index()
    {
        $pembelian = $this->pembelianService->getAll();

        return view('', compact('pembelian'));
    }

    public function show(int $id)
    {
        try {
            $pembelian = $this->pembelianService->getById($id);

            return view('', compact('pembelian'));
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
        return view('');
    }

    public function edit(int $id)
    {
        $pembelian = $this->pembelianService->getById($id);

        return view('', compact('pembelian'));
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

    public function update(UpdatePembelianRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $this->pembelianService->update($id, $data);

            return redirect()
                ->back()
                ->with('success', 'Transaksi pembelian berhasil diubah');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => 'Gagal mengubah transaksi pembelian.',
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
